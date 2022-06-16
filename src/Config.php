<?php

namespace Deck\Application;

class Config
{
    public static array $config = [];

    public static function getConfig($key = null): array
    {
        if ($key) {
            return static::$config[$key];
        }
        return static::$config;
    }

    public static function setConfig(array $config)
    {
        static::$config = array_merge_recursive(static::$config, $config);
    }

}