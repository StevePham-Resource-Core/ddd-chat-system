<?php

if (! function_exists('ddd_path')) {
    /**
     * @var string $layer
     * @var string|null $path
     */
    function ddd_path($layer = 'I', $path = '')
    {
        $layerMappers = [
            'A' => 'Application',
            'I' => 'Infrastructure',
            'D' => 'Domain'
        ];

        $layer = $layerMappers[$layer];

        if (empty($layer)) {
            throw new \Exception('Invalid Layer.');
        }

        return app()->basePath() . '/DDD' . ($layer && $path ? DIRECTORY_SEPARATOR . $layer . DIRECTORY_SEPARATOR .$path : $path);
    }
}

if (! function_exists('config_path')) {
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}
