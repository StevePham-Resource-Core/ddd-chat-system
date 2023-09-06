<?php

namespace App\Providers;

use DDD\Infrastructure\Kafka\Providers\KafkaServiceProvider;
use DDD\Infrastructure\User\Providers\UserServiceProvider;
use Illuminate\Support\ServiceProvider;

class DDDServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(UserServiceProvider::class);
        $this->app->register(KafkaServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
