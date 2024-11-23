<?php

use Core\App;
use Core\Database;
use Core\Response;

$currentUserId = $_SESSION['user']['id'];

$db = App::resolve(Database::class);

$note = $db->query('SELECT' . ' * FROM notes WHERE id = :id', [
    'id' => $_POST['id'],
])->findOrFail();

authorize($note['user_id'] === $currentUserId, Response::Forbidden->value);

$db->query( 'DELETE ' . 'FROM notes WHERE id = :id', [
    'id' => $_POST['id']
]);

header('location: /notes');
die();
