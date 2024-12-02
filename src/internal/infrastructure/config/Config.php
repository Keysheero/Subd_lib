<?php

namespace Infrastructure\config;

use Symfony\Component\Yaml\Yaml;

class Config
{
    private array $config;

    public function __construct(string $configPath = null)
    {
        if ($configPath === null) {
            $configPath = dirname(__DIR__, 4) . '/configuration/local.yaml';
        }
        if (!file_exists($configPath)) {
            throw new \InvalidArgumentException("Configuration file not found: $configPath");
        }

        $this->config = Yaml::parseFile($configPath);
    }

    public function get(string $key, $default = null)
    {
        $keys = explode('.', $key);
        $value = $this->config;

        foreach ($keys as $segment) {
            if (is_array($value) && array_key_exists($segment, $value)) {
                $value = $value[$segment];
            } else {
                return $default;
            }
        }

        return $value;
    }

    public function all(): array
    {
        return $this->config;
    }
}
