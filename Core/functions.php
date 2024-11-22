<?php

use Core\Response;

function dd(mixed $value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function uriIs(string $value): bool
{
    return parse_url($_SERVER['REQUEST_URI'])['path']  === $value;
}

function authorize($condition, $status = Response::Forbidden)
{
    if (! $condition) {
        abort($status);
    }

    return true;
}

function base_path(string $path): string
{
    return BASE_PATH . $path;
}

function view(string $path, array $attributes = []): void
{
    extract($attributes);

    require base_path('views/' . $path);
}
function abort($code = Response::NotFound->value) {
    http_response_code($code);

    view("$code.php");

    die();
}

function redirect(string $path): void
{
    header("location: $path");

    die();
}

function login(array $user): void
{
    $_SESSION['user'] = [
        'id' => $user['id'],
        'email' => $user['email']
    ];

    session_regenerate_id(true);
}

function logout(): void
{
    $_SESSION['user'] = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}