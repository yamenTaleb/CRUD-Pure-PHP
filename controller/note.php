<?php

$heading = 'Your Note';

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUser = 1;

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_GET['id'],
])->fetch();

authorize($note['user_id'] === $currentUser, Response::Forbidden->value);

view('note.view.php', [
    'note' => $note,
    'heading' => $heading,
]);