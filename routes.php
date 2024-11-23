<?php

global $route;
$route->get('/', 'index.php');
$route->get('/about', 'about.php');
$route->get('/contact', 'contact.php');

$route->get('/notes', 'notes/index.php')->only('auth');
$route->get('/note', 'notes/show.php')->only('auth');
$route->get('/note/create', 'notes/create.php')->only('auth');
$route->delete('/note', 'notes/destroy.php')->only('auth');
$route->post('/notes', 'notes/store.php')->only('auth');
$route->get('/note/edit', 'notes/edit.php')->only('auth');
$route->patch('/note', 'notes/update.php')->only('auth');

$route->get('/register', 'registration/create.php')->only('guest');
$route->post('/register', 'registration/store.php')->only('guest');

$route->get('/login', 'sessions/create.php')->only('guest');
$route->post('/session', 'sessions/store.php')->only('guest');
$route->delete('/session', 'sessions/destroy.php')->only('auth');
