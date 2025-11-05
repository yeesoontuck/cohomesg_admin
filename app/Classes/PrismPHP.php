<?php

namespace App\Classes;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

use Prism\Prism\Facades\Prism;
use Prism\Prism\Enums\Provider;
use Prism\Prism\Facades\Tool;
use App\Classes\PropertyFinder;

use Prism\Prism\ValueObjects\Messages\SystemMessage;
use Prism\Prism\ValueObjects\Messages\UserMessage;
use Prism\Prism\ValueObjects\Messages\AssistantMessage;
// use Prism\Prism\ValueObjects\Messages\ToolResultMessage;

class PrismPHP
{
    protected $system_prompt;
    protected $provider;
    protected $model;

    protected $tools_array = [];

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->system_prompt = <<<'END'
            You are a real estate assistant that helps people find rooms to rent.
            If the user's queries are not related to finding rooms to rent in Singapore, politely inform them that you can only assist with rental property searches.
            Guide the user to narrow the search parameters to find suitable rental properties.
            When the user provides a postal code, immediately call the find_property_near_postal_code function with that postal code.
            When the user provides a street name, immediately call the find_property_near_street_name function with that street name.
            If you perform a search based on proximity, return the distance of each property from the postal code or street name.
            Do not correct the street name spelling even if it seems incorrect.
            When the user requests to find rental properties, ask for more details if necessary.
            Parameters include district (location), minimum and maximum price per month, type of room (standard or master bedroom that includes en-suite bath).
            If the user does not provide specific filters such as price range or room type, assume the following defaults:
            - price_minimum = 800
            - price_maximum = 3000
            - property_type = "condominium"
            - room_type = "standard room"
            Then immediately call the property_search tool with those defaults.
            The 'price_month' field already includes utilities unless stated otherwise.
            Do not add the 'utilities' separately with 'price_month' when presenting rental costs.
            Always format the message for WhatsApp:
            - Each property on a separate line
            - Use simple bullet points with "-"
            - No markdown like **, __, or ```
            END; 

        $this->provider = Provider::OpenAI;
        $this->model = 'gpt-4o-mini';

        // $this->provider = Provider::Ollama;
        // $this->model = 'llama2';

        // $this->provider = Provider::Anthropic;
        // $this->model = 'claude-3-7-sonnet-latest';



        $this->tools_array[] = Tool::as('property_near_postal_code')
            ->for('Find rental properties near a given postal code in Singapore.')
            ->withStringParameter('postalCode', 'The 6-digit Singapore postal code', true)
            ->withNumberParameter('maxDistanceKm', 'Maximum distance in kilometers from the postal code', false)
            ->using(function (string $postalCode, float $maxDistanceKm): string {
                
                return json_encode((new PropertyFinder)::findPropertyNearPostalCode($postalCode, $maxDistanceKm));
            });

        $this->tools_array[] = Tool::as('property_near_street_name')
            ->for('Find rental properties near a given street name in Singapore.')
            ->withStringParameter('streetName', 'The Singapore street name', true)
            ->withNumberParameter('maxDistanceKm', 'Maximum distance in kilometers from the street name', false)
            ->using(function (string $streetName, float $maxDistanceKm): string {
                
                return json_encode((new PropertyFinder)::findPropertyNearStreetName($streetName, $maxDistanceKm));
            });

        $this->tools_array[] = Tool::as('property_search')
            ->for('Search for available rental properties based on minimum and maximum price per month, type of room (standard or master bedroom that includes en-suite bath).')
            ->withNumberParameter('price_minimum', 'Minimum rental price per month Singapore dollars', false)
            ->withNumberParameter('price_maximum', 'Maximum rental price per month Singapore dollars', false)
            ->withEnumParameter('property_type', 'The type of property', ['condominium', 'shophouse'])
            ->withEnumParameter('room_type', 'Type of room', ['standard room', 'master room', 'premium large room'])
            ->using(function (float $price_minimum, float $price_maximum, string $property_type, string $room_type): string {
                return json_encode((new PropertyFinder)::search($price_minimum, $price_maximum, $property_type, $room_type));
            });

    }


    public function prism_text($message)
    {
        $response = Prism::text()
            ->using($this->provider, $this->model)
            ->withMaxSteps(3)
            ->withMessages([
                new SystemMessage($this->system_prompt),
                new UserMessage($message)
            ])
            ->withTools($this->tools_array)
            ->asText();
                
        if ($response->toolResults) {
            foreach ($response->toolResults as $toolResult) {
                echo "Tool: " . $toolResult->toolName . "\n";
                echo "Result: " . $toolResult->result . "\n";
            }
        }
        foreach ($response->steps as $step) {
            if ($step->toolCalls) {
                foreach ($step->toolCalls as $toolCall) {
                    Log::channel('tools')->info('Prism calling tool: ' . $toolCall->name . ' with args: ' . json_encode($toolCall->arguments()));
                    // echo "Tool: " . $toolCall->name . "\n";
                    // echo "Arguments: " . json_encode($toolCall->arguments()) . "\n";
                }
            }
        }
        
        echo $response->text;
    }
}
