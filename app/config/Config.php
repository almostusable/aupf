<?php

declare(strict_types=1);

namespace App\config;

class Config
{
    protected array $config = [
        'app' => [
            'name' => 'My App'
        ]
    ];

    public function get(string $key, $default = null)
    {
        return dot($this->config)->get($key, $default);
    }

    public function merge(array $config): Config
    {
        $this->config = array_merge_recursive($this->config, $config);

        return $this;
    }

    public function mergeConfigFromFiles(Config $config): Config
    {
        $path = __DIR__ . '/../../config';

        $files = scandir($path);
        foreach (array_diff($files, ['..', '.']) as $file) {
            $this->merge([
                explode('.', $file)[0] => require($path . '/' . $file)
            ]);
        }

        return $config;
    }
}