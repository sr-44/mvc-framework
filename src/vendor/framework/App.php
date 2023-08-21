<?php

namespace framework;

class App
{
    public static Registry $app;

    public function __construct()
    {
        self::$app = Registry::getInstance();
        $this->getParams();
    }

    public function getParams(): void
    {
        $params = require CONFIG . '/params.php';
        if (!empty($params)) {
            foreach ($params as $k => $v) {
                self::$app->setProperty($k, $v);
            }
        }
    }
}