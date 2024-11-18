<?php

use Core\Database;
use Core\Response;

$heading = 'Your Note';
$currentUser = 1;

$config = require base_path('config.php');
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $note = $db->query('SELECT' . ' * FROM notes WHERE id = :id', [
        'id' => $_GET['id'],
    ])->fetch();

    authorize($note['user_id'] === $currentUser, Response::Forbidden->value);

    $db->query( 'DELETE ' . 'FROM notes WHERE id = :id', [
        'id' => $_POST['id']
    ]);

    header('location: /notes');
    exit();
} else {

    $note = $db->query('SELECT' . ' * FROM notes WHERE id = :id', [
        'id' => $_GET['id'],
    ])->fetch();

    authorize($note['user_id'] === $currentUser, Response::Forbidden->value);

    view('note.view.php', [
        'note' => $note,
        'heading' => $heading,
    ]);
}
