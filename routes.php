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

$route->get('/notes', 'controller/notes/index.php');
$route->get('/note', 'controller/notes/show.php');
$route->get('/note/create', 'controller/notes/create.php');
$route->delete('/note', 'controller/notes/destroy.php');
$route->post('/notes', 'controller/notes/store.php');
