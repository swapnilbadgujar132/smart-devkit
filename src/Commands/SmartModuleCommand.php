<?php

namespace Swapnil\SmartDevkit\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class SmartModuleCommand extends Command
{
    protected $signature = 'smart:module {name}';
    protected $description = 'Create Model, Controller, and Migration for a new Laravel module';

    public function handle()
    {
        $name = Str::studly($this->argument('name'));

        $this->callSilent('make:model', ['name' => "Models/{$name}"]);
        $this->info("✅ Model created: app/Models/{$name}.php");

        $this->callSilent('make:controller', ['name' => "{$name}Controller"]);
        $this->info("✅ Controller created: app/Http/Controllers/{$name}Controller.php");

        $table = Str::plural(Str::snake($name));
        $this->callSilent('make:migration', ['name' => "create_{$table}_table"]);
        $this->info("✅ Migration created: create_{$table}_table");

        $this->newLine();
        $this->info("🎉 Module '$name' generated successfully!");
    }
}
