<?php

namespace Swapnil\SmartDevkit;

use Illuminate\Support\ServiceProvider;
use Swapnil\SmartDevkit\Commands\SmartModuleCommand;

class SmartDevkitServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            SmartModuleCommand::class,
        ]);
    }

    public function boot() {}
}
