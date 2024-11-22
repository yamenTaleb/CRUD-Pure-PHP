<?php

use Core\App;
use Core\Database;
use Core\Response;
use Core\Validator;

if (! Validator::string($_POST['body'], 10, 1000)) {
    $error['body'] = 'body must be between 10 and 1000 characters';

    view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $error
    ]);
} else {
    $currentUser = 8;

    $db = App::resolve(Database::class);

    $note = $db->query('SELECT' . ' * FROM notes WHERE id = :id', [
        'id' => $_POST['id'],
    ])->findOrFail();

    authorize($note['user_id'] === $currentUser, Response::Forbidden->value);

    $db->query('UPDATE' . ' notes SET body = :body WHERE id = :id', [
        'body' => $_POST['body'],
        'id' => $_POST['id'],
    ]);

    header('location: /notes');
    die();
}



