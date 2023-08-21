<?php

namespace framework;

use JetBrains\PhpStorm\NoReturn;
use Throwable;

class ErrorHandler
{
    public function __construct()
    {
        DEBUG ? error_reporting(-1) : error_reporting(0);
        set_exception_handler([$this, 'exceptionHandler']);
        set_error_handler([$this, 'errorHandler']);
        ob_start();
        register_shutdown_function([$this, 'fatalErrorHandler']);
    }

    #[NoReturn] public function errorHandler($errno, $errStr, $errFile, $errLine): void
    {
        $this->logError($errStr, $errFile, $errLine);
        $this->displayError($errno, $errStr, $errFile, $errLine);
    }

    public function fatalErrorHandler(): void
    {
        $error = error_get_last();
        if (!empty($error) && $error['type'] && (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)) {
            $this->logError($error['message'], $error['file'], $error['line']);
            ob_end_clean();
            $this->displayError($error['type'], $error['message'], $error['file'], $error['line']);
        } else {
            ob_end_flush();
        }
    }

    #[NoReturn] public function exceptionHandler(Throwable $e): void
    {
        $this->logError($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError("Исключение", $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    protected function logError($message = '', $file = '', $line = ''): void
    {
        file_put_contents(
            LOGS . '/errors.log',
            "[" . date('Y-m-d H:i:s') . "] Текст ошибки: $message | Файл: $file | Строка: $line\n======================\n", FILE_APPEND);
    }

    #[NoReturn] protected function displayError($errno, $errStr, $errFile, $errLine, $response = 500): void
    {
        //$response = ($response === 0) ? 404 : $response;
        if ($response === 0) {
            $response = 404;
        }
        http_response_code($response);
        if ($response === 404 && !DEBUG) {
            require WWW . '/errors/404.php';
            die();
        }
        if (DEBUG) {
            require WWW . '/errors/development.php';
        } else {
            require WWW . '/errors/production.php';
        }
        die();
    }

}