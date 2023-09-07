<?php

namespace DDD\Infrastructure\Core\Providers;

use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    protected $layer = 'I';

    public function register()
    {
        $this->mergeConfig();
    }

    public function boot()
    {
        $this->bootConfig();
    }

    public function configName()
    {
        return 'ddd_core';
    }

    public function mergeConfig()
    {
        $this->mergeConfigFrom(ddd_path($this->layer, 'Core/Config/config.php'), $this->configName());
    }

    public function bootConfig()
    {
        $this->publishes([ ddd_path($this->layer, 'Core/Config/config.php') => config_path($this->configName().'.php') ], 'config');
    }
}
