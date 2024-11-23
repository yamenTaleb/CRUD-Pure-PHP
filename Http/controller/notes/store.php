<?php

use Core\App;
use Core\Database;
use Core\Validator;

if (! Validator::string($_POST['body'], 10, 1000)) {
    $error['body'] = 'body must be between 10 and 1000 characters';

    view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $error
    ]);
}
else {
    $db = App::resolve(Database::class);

    $db->query('INSERT' . ' INTO notes (body, user_id) VALUES (:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => 8
    ]);

    header('location: /notes');
    die();
}



