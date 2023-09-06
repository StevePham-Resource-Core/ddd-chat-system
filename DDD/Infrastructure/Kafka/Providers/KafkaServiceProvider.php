<?php

namespace DDD\Infrastructure\Kafka\Providers;

use DDD\Application\IntegrationClients\KafkaClient;
use DDD\Infrastructure\Kafka\Commands\KafkaConsumer;
use DDD\Infrastructure\Kafka\Services\KafkaService;
use Illuminate\Support\ServiceProvider;

class KafkaServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(KafkaService::class, function($app) {
        });
    }

    public function boot()
    {
        $this->registerConfig();
        $this->registerCommands();
    }

    public function registerConfig()
    {
    }

    public function registerCommands()
    {
        return $this->commands([
            KafkaConsumer::class,
        ]);
    }
}
