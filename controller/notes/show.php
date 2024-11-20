<?php

use Core\App;
use Core\Database;
use Core\Response;

$currentUser = 1;

$db = App::resolve(Database::class);

$note = $db->query('SELECT' . ' * FROM notes WHERE id = :id', [
    'id' => $_GET['id'],
])->findOrFail();

authorize($note['user_id'] === $currentUser, Response::Forbidden->value);

view('notes/show.view.php', [
    'note' => $note,
    'heading' => 'Your Note',
]);