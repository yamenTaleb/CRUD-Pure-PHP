<?php

namespace Core;

class Session
{
    public static function has(string $key): bool
    {
        return self::get($key);
    }
    public static function put(string $key, string|array $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key, null|string|array $default = null): mixed
    {
       return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function flash(string $key, string|array $value): void
    {
        $_SESSION['_flash'][$key] = $value;
    }

    public static function expire(): void
    {
        unset($_SESSION['_flash']);
    }

    public static function flush(): void
    {
        $_SESSION = [];
    }

    public static function destroy()
    {
        self::flush();

        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}