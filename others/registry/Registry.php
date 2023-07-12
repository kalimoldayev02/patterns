<?php

class Registry
{
    private static array $storage;

    public static function get(string $key): ?static
    {
        if (isset(self::$storage[$key])) {
            return self::$storage[$key];
        }
        return null;
    }

    public static function set(string $key, $value): static
    {
        return self::$storage[$key] = $value;
    }

    public static function remove(string $key): void
    {
        if (isset(self::$storage[$key])) {
            unset(self::$storage[$key]);
        }
    }
}