<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SlugRebuild extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:slug-rebuild {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rebuild the slug column for a given model, e.g. Room, Property';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $modelClass = 'App\Models\\' . $this->argument('model');

        if (!class_exists($modelClass)) {
            $this->error("Model class {$modelClass} does not exist.");
            return 1;
        }

        $modelInstance = new $modelClass;

        if (!method_exists($modelInstance, 'generateSlug')) {
            $this->error("Model class {$modelClass} does not have a generateSlug method.");
            return 1;
        }

        $records = $modelClass::all();
        $this->info("Rebuilding slugs for " . $records->count() . " records of model {$modelClass}.");

        foreach ($records as $record) {
            $record->generateSlug();
            $record->save();
            $this->info("Rebuilt slug for record ID: {$record->id}");
        }

        $this->info("Slug rebuild completed for model {$modelClass}.");
        return 0;
    }
}
