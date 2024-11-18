<?php


use Core\Database;
use Core\Validator;

$error = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Validator::string($_POST['body'], 10, 1000))
        $error['body'] = 'body must be between 100 and 10000 characters';

    else {
        $config = require base_path('config.php');
        $db = new Database($config['database']);

        $statement = $db->query('INSERT' . ' INTO notes (body, user_id) VALUES (:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);

        header('location: /notes');
        exit();
    }
}

view("notes/create.view.php", [
    'heading' => 'Create Note',
    'errors' => $error
]);


