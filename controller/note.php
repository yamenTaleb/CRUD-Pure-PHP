<?php

use Core\Database;
use Core\Response;

$heading = 'Your Note';
$currentUser = 1;

$config = require base_path('config.php');
$db = new Database($config['database']);


$note = $db->query('SELECT' . ' * FROM notes WHERE id = :id', [
    'id' => $_GET['id'],
])->fetch();

authorize($note['user_id'] === $currentUser, Response::Forbidden->value);

view('note.view.php', [
    'note' => $note,
    'heading' => $heading,
]);