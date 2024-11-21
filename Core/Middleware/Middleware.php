<?php

namespace Core\Middleware;

class Middleware
{
    const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class,
    ];

    public static function resolve(?string $key): void
    {
        if (!$key)
            return;

        $middleware = self::MAP[$key] ?? false;

        if (!$middleware)
            throw new \Exception("No matching middleware found for{$key}");

        (new $middleware)->handle();
    }
}