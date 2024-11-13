<?php

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