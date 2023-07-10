<?php

class Singleton
{
    private static ?self $instance = null;

    protected function __construct() { }  // защищаем от создания через new Singleton

    protected function __clone() { } // защищаем от создания через клонирование

    public static function getInstance(): static
    {
        if (is_null(self::$instance)) {
            self::$instance = new static();
        }

        return self::$instance;
    }
}

// вывод
$pattern1 = Singleton::getInstance();
$pattern2 = Singleton::getInstance();

if ($pattern1 === $pattern2) {
    echo "1" . PHP_EOL;
    return;
}
echo "0" . PHP_EOL;