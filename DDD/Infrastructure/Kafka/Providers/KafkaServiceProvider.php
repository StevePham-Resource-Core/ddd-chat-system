<?php

namespace DDD\Infrastructure\Kafka\Providers;

use DDD\Application\IntegrationClients\KafkaClient;
use DDD\Infrastructure\Kafka\Commands\KafkaConsumer;
use DDD\Infrastructure\Kafka\Services\KafkaService;
use Illuminate\Support\ServiceProvider;

class KafkaServiceProvider extends ServiceProvider
{
    protected $layer = 'I';

    public function register()
    {
        $this->mergeConfig();

        $this->app->singleton(KafkaService::class, function($app) {
            return new KafkaService(config('ddd_kafka.kafka_connection'));
        });

        $this->app->singleton(KafkaClient::class, function($app) {
            return $app->make(KafkaService::class)->client();
        });
    }

    public function boot()
    {
        $this->bootConfig();
        $this->bootCommands();
    }

    public function configName()
    {
        return 'ddd_kafka';
    }

    public function mergeConfig()
    {
        $this->mergeConfigFrom(ddd_path($this->layer, 'Kafka/Config/config.php'), $this->configName());
    }

    public function bootConfig()
    {
        $this->publishes([ ddd_path($this->layer, 'Kafka/Config/config.php') => config_path($this->configName().'.php') ], 'config');
    }

    public function bootCommands()
    {
        return $this->commands([
            KafkaConsumer::class,
        ]);
    }
}
