<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = require base_path('routes.php');

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    abort();
}


function abort($code = Response::NotFound->value) {
    http_response_code($code);

    view("$code.php");

    die();
}