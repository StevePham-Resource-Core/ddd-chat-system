<?php

namespace DDD\Infrastructure\Kafka\Services;

use Illuminate\Contracts\Container\BindingResolutionException;

class KafkaService
{
    private $config;

    public function __construct($config = [])
    {
        $this->config = $config;
    }

    /**
     * @return $this
     * @throws BindingResolutionException
     */
    public static function make()
    {
        return app(static::class);
    }

    public function client()
    {
        dd('client');
    }
}
