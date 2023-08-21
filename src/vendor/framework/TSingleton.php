<?php

namespace framework;

trait TSingleton
{
    private static ?self $instance;

    private function __construct()
    {
    }

    public static function getInstance(): static
    {
        return static::$instance ?? static::$instance = new static();
    }

}