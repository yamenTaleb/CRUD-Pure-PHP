<?php


//return [
//    '/' => 'controller/index.php',
//    '/about' => 'controller/about.php',
//    '/contact' => 'controller/contact.php',
//    '/notes' => 'controller/index.php',
//    '/note' => 'controller/show.php',
//    '/note/create' => 'controller/create.php',
//];

global $route;
$route->get('/', 'controller/index.php');
$route->get('/about', 'controller/about.php');
$route->get('/contact', 'controller/contact.php');

$route->get('/notes', 'controller/notes/index.php')->only('auth');
$route->get('/note', 'controller/notes/show.php')->only('auth');
$route->get('/note/create', 'controller/notes/create.php')->only('auth');
$route->delete('/note', 'controller/notes/destroy.php')->only('auth');
$route->post('/notes', 'controller/notes/store.php')->only('auth');
$route->get('/note/edit', 'controller/notes/edit.php')->only('auth');
$route->patch('/note', 'controller/notes/update.php')->only('auth');

$route->get('/register', 'controller/registration/create.php')->only('guest');
$route->post('/register', 'controller/registration/store.php')->only('guest');

$route->get('/login', 'controller/sessions/create.php')->only('guest');
$route->post('/session', 'controller/sessions/store.php')->only('guest');
$route->delete('/session', 'controller/sessions/destroy.php')->only('auth');
