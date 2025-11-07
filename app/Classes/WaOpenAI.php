<?php

namespace App\Classes;

use Illuminate\Support\Facades\Log;
use OpenAI\Laravel\Facades\OpenAI;
use App\Models\Property;

class WaOpenAI
{
    /*
     * https://github.com/openai-php/laravel
     * composer require openai-php/laravel
     * php artisan openai:install
     * config/openai.php
     */

    private $system_prompt;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->system_prompt = <<<'END'
            You are a real estate assistant that helps people find rooms to rent in Singapore.

            If the user's query is unrelated to room rentals in Singapore, politely inform them that you can only assist with rental property searches.

            When the user asks to find rental properties:
                - Collect key search parameters if they are missing:
                    • Minimum and maximum price per month
                    • Room type (standard or master bedroom with en-suite bath)
                    • Property type (condominium, shophouse, etc.)
                - If any of these parameters are not provided, use the following defaults:
                    - price_minimum = 800
                    - price_maximum = 2000
                    - property_type = "condominium"
                    - room_type = "standard room"

            Always format the message for WhatsApp:
                - Each property on a separate line
                - Use simple bullet points with "-"
                - Do not use markdown (no **, __, or ```)

            When you have enough details (even without postal code or street name), immediately call the appropriate function.
            END;        
        }

        public function chat($message, $recent_messages)
        {
            // set system prompt and recent messages into input array first
            $model_input = [
                [
                    'role' => 'system',
                    'content' => $this->system_prompt
                ]                
            ];
            $model_input = array_merge($model_input, $recent_messages);

            // then add the new user message
            $model_input[] = [
                'role' => 'user',
                'content' => $message
            ];

            // log input for debugging, convert $model_input to string
            // Log::info('Model input: ' . json_encode($model_input));

            $response = OpenAI::responses()->create([
                'model' => 'gpt-4o-mini',
                'tools' => [
                    [
                        'type' => 'function',
                        'name' => 'find_property',
                        'description' => 'Search for available rental properties based on minimum and maximum price per month, type of room (standard or master bedroom that includes en-suite bath).',
                        'parameters' => [
                            'type' => 'object',
                            'properties' => [
                                'price_minimum' => [
                                    'type' => 'number',
                                    'description' => 'The minimum rental price per month in Singapore dollars SGD.',
                                ],
                                'price_maximum' => [
                                    'type' => 'number',
                                    'description' => 'The maximum rental price per month in Singapore dollars SGD.',
                                ],
                                'property_type' => [
                                    'type' => 'string',
                                    'enum' => ['condominium', 'shophouse'],
                                ],
                                'room_type' => [
                                    'type' => 'string',
                                    'enum' => ['standard room', 'master room', 'premium large room'],
                                ],
                            ],
                            // 'required' => ['price_maximum'],
                        ],
                    ],
                    [
                        'type' => 'function',
                        'name' => 'find_property_near_postal_code',
                        'description' => 'Finds rental properties near a Singapore postal code.',
                        'parameters' => [
                            'type' => 'object',
                            'properties' => [
                                'postal_code' => [
                                    'type' => 'string',
                                    'description' => 'The Singapore postal code to search near. If it is less than 6 digits, pad with leading zeros.',
                                ],
                                'max_distance_km' => [
                                    'type' => 'number',
                                    'description' => 'The maximum search radius in kilometers',
                                    'default' => 10
                                ]
                            ],
                        ],
                        'required' => ['postal_code']
                    ],
                    [
                        'type' => 'function',
                        'name' => 'find_property_near_street_name',
                        'description' => 'Finds rental properties near a street name by first looking up the postal code from the street name.',
                        'parameters' => [
                            'type' => 'object',
                            'properties' => [
                                'street_name' => [
                                    'type' => 'string',
                                    'description' => 'The street name to search near.',
                                ],
                                'max_distance_km' => [
                                    'type' => 'number',
                                    'description' => 'The maximum search radius in kilometers',
                                    'default' => 10
                                ]
                            ]
                        ],
                        'required' => ['street_name']
                    ]
                ],
                'input' => $model_input,
                'tool_choice' => 'auto',
                // 'parallel_tool_calls' => true,
                // 'store' => true,
                // 'metadata' => [
                //     'user_id' => '123',
                //     'session_id' => 'abc456'
                // ]
            ]);

            $finalText = null;
            $properties = [];

            foreach ($response->output as $item) 
            {
                if ($item->type === 'function_call') {
                    $name = $item->name ?? null;
                    $args = json_decode($item->arguments ?? '{}', true) ?: [];
    
                    if ($name === 'find_property_near_street_name') {
                        
                        Log::channel('tools')->info('Calling find_property_near_street_name with args: ' . json_encode($args));

                        $street_name = $args['street_name'] ?? null;
                        $max_distance_km = $args['max_distance_km'] ?? 10;

                        // lookup postal code from street name
                        $postal = \App\Models\PostalLatLon::searchStreet($street_name)->first();

                        if (!$postal) {
                            $result = [
                                'success' => false,
                                'message' => "Street name {$street_name} not found.",
                            ];
                        } else {
                            // call findPropertyNearPostalCode
                            $result = PropertyFinder::findPropertyNearPostalCode($postal->postal_code, $max_distance_km);
                        }

                        $followUp = OpenAI::responses()->create([
                            'model' => 'gpt-4o-mini',
                            'input' => [
                                [
                                    'role' => 'system',
                                    'content' => $this->system_prompt
                                ],
                                [
                                    'role' => 'user',
                                    'content' => $message
                                ],
                                [
                                    'role' => 'assistant',
                                    'content' => json_encode($result, JSON_PRETTY_PRINT)
                                ],
                            ],
                        ]);

                        $finalText = $followUp->outputText;

                    } else if ($name === 'find_property_near_postal_code') {
                        
                        Log::channel('tools')->info('Calling find_property_near_postal_code with args: ' . json_encode($args));

                        $postal_code = $args['postal_code'] ?? null;
                        $max_distance_km = $args['max_distance_km'] ?? 10;

                        $result = PropertyFinder::findPropertyNearPostalCode($postal_code, $max_distance_km);

                        $followUp = OpenAI::responses()->create([
                            'model' => 'gpt-4o-mini',
                            'input' => [
                                [
                                    'role' => 'system',
                                    'content' => $this->system_prompt
                                ],
                                [
                                    'role' => 'user',
                                    'content' => $message
                                ],
                                [
                                    'role' => 'assistant',
                                    'content' => json_encode($result, JSON_PRETTY_PRINT)
                                ],
                            ],
                        ]);

                        $finalText = $followUp->outputText;

                    } else if ($name === 'find_property') {
                        
                        Log::channel('tools')->info('Calling find_property with args: ' . json_encode($args));

                        // Search properties
                        $query = Property::query();

                        // filters — only apply if present
                        if (!empty($args['price_minimum']) && !empty($args['price_maximum'])) {
                            $query->whereBetween('price_month', [
                                $args['price_minimum'],
                                $args['price_maximum']
                            ]);
                        } elseif (!empty($args['price_minimum'])) {
                            $query->where('price_month', '>=', $args['price_minimum']);
                        } elseif (!empty($args['price_maximum'])) {
                            $query->where('price_month', '<=', $args['price_maximum']);
                        }

                        // Optional filters
                        if (!empty($args['property_type'])) {
                            $query->where('property_type', $args['property_type']);
                        }

                        if (!empty($args['room_type'])) {
                            $query->where('room_type', $args['room_type']);
                        }

                        // Execute query
                        $properties = $query->with('district')->get();

                        $followUp = OpenAI::responses()->create([
                            'model' => 'gpt-4o-mini',
                            'input' => [
                                [
                                    'role' => 'system',
                                    'content' => $this->system_prompt
                                ],
                                [
                                    'role' => 'user',
                                    'content' => $message
                                ],
                                [
                                    'role' => 'assistant',
                                    'content' => json_encode($properties, JSON_PRETTY_PRINT)
                                ],
                            ],
                        ]);

                        $finalText = $followUp->outputText;
                    }
                }
            }

            if (!$finalText) {
                $finalText = $response->outputText;
            }

            // return response()->json([
            //     'reply' => $finalText,
            //     'properties' => $properties,
            // ]);

            return $finalText;
        }
    }
