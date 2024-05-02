<?php
namespace vendor\core;

class ErrorHandler
{
    public static $exceptions = [
        -1 => "UNDEFINED",
        E_ERROR => "E_ERROR",
        E_WARNING => "E_WARNING",
        E_PARSE => "E_PARSE",
        E_NOTICE => "E_NOTICE",
        E_CORE_ERROR => "E_CORE_ERROR",
        E_CORE_WARNING => "E_CORE_WARNING",
        E_COMPILE_ERROR => "E_COMPILE_ERROR",
        E_COMPILE_WARNING => "E_COMPILE_WARNING",
        E_USER_ERROR => "E_USER_ERROR",
        E_USER_WARNING => "E_USER_WARNING",
        E_USER_NOTICE => "E_USER_NOTICE",
        E_STRICT => "E_STRICT",
        E_RECOVERABLE_ERROR => "E_RECOVERABLE_ERROR",
        E_DEPRECATED => "E_DEPRECATED",
        E_USER_DEPRECATED => "E_USER_DEPRECATED",
        E_ALL => "E_ALL"
    ];
    public function __construct()
    {
        if (DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }
        set_error_handler([$this, 'errorHandler']);
        ob_start();
        register_shutdown_function([$this, 'fatalErrorHandler']);
        set_exception_handler([$this, 'exceptionHandler']);
    }
    public function errorHandler($errno, $errstr, $errfile, $errline)
    {
        $this->logErrors($errno, $errstr, $errfile, $errline);
        if (DEBUG || in_array($errno, [E_USER_ERROR, E_RECOVERABLE_ERROR]))
            $this->displayError($errno, $errstr, $errfile, $errline);
    }
    public function fatalErrorHandler()
    {
        $error = error_get_last();
        if (!empty($error) && $error['type'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)) {
            $this->logErrors($error['type'], $error['message'], $error['file'], $error['line']);
            ob_end_clean();
            $this->displayError($error['type'], $error['message'], $error['file'], $error['line']);
        } else {
            ob_end_flush();
        }
    }
    public function exceptionHandler($exception)
    {
        $message = $exception->getMessage();
        $file = $exception->getFile();
        $line = $exception->getLine();
        $response = $exception->getCode();
        $this->logErrors('Exception', $message, $file, $line);
        $this->displayError('Exception', $message, $file, $line, $response);
    }
    protected function logErrors($code = -1, $message = '', $file = '', $line = '')
    {
        $errname = isset(self::$exceptions[$code]) ? self::$exceptions[$code] : $code;
        $errorText = '[' . date("Y-m-d H:i:s") . ']' . PHP_EOL;
        $errorText .= 'Code: ' . $errname . PHP_EOL;
        $errorText .= 'Message: ' . $message . PHP_EOL;
        $errorText .= 'File: ' . $file . PHP_EOL;
        $errorText .= 'Line: ' . $line . PHP_EOL;
        $errorText .= '----------' . PHP_EOL;
        error_log($errorText, 3, ROOT . '/tmp/errors.log');
    }
    protected function displayError($errno, $errstr, $errfile, $errline, $response = 500)
    {
        http_response_code($response);
        if ($response === 404) {
            require WWW . '/errors/404.html';
            die;
        }
        $errname = '';
        if (isset(self::$exceptions[$errno]))
            $errname = self::$exceptions[$errno];
        else
            $errname = $errno;
        if (DEBUG) {
            require WWW . '/errors/dev.php';
        } else {
            require WWW . '/errors/prod.php';
        }
        die;
    }
}