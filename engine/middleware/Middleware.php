<?php

namespace engine\Middleware;

class Middleware {

    public const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class,
    ];

    public static function resolve($key) {
        if (!$key){
            return;
        }

        $middleware = static::MAP[$key] ?? false;

        if (!$middleware) {
            throw new \Exception('Middleware :: no matching middleware found for key: {$key}.');
        }

        (new $middleware)->handle();
    }

}

?>