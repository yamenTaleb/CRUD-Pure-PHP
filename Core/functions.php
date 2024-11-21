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