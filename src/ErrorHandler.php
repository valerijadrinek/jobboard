<?php

class ErrorHandler {
//error handler
public static function handleError(int $errno, string $errstr, string $errfile, int $errline) : void {

    throw new ErrorException($errstr, 0, $errno, $errfile, $errline );

}

//exception handler
public static function handleException (Throwable $e) : void {

    echo $e->getCode(), $e->getFile(), $e->getLine(),
    $e->getMessage();
}
}