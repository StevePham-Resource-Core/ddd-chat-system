<?php

namespace App\Providers;

use DDD\Infrastructure\Core\Providers\CoreServiceProvider;
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
        $this->registerUtils();
        $this->registerDDDServiceProvider();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    public function registerDDDServiceProvider()
    {
        $this->app->register(KafkaServiceProvider::class);
        $this->app->register(CoreServiceProvider::class);
        $this->app->register(UserServiceProvider::class);
    }

    public function registerUtils()
    {
        if (file_exists($file = app()->basePath('utils/helpers.php'))) {
            require $file;
        }
    }
}
