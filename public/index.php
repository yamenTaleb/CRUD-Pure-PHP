<?php

use Core\Session;

const BASE_PATH = __DIR__.'/../';

session_start();

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

require base_path('bootstrap.php');

$route = new \Core\Router();

require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $route->router($uri, $method);
} catch (\Core\ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', [
        'email' => $exception->attributes['email'],
    ]);

    redirect($route->previousURL());
}

Session::expire();