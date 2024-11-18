<?php

use Core\Database;
use Core\Response;

$currentUser = 1;

$config = require base_path('config.php');
$db = new Database($config['database']);

$note = $db->query('SELECT' . ' * FROM notes WHERE id = :id', [
    'id' => $_POST['id'],
])->findOrFail();

authorize($note['user_id'] === $currentUser, Response::Forbidden->value);

$db->query( 'DELETE ' . 'FROM notes WHERE id = :id', [
    'id' => $_POST['id']
]);

header('location: /notes');
die();
