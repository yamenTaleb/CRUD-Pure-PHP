<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUser = 1;

$notes = $db->query('SELECT * FROM notes WHERE user_id = :id', [
    'id' => $currentUser
])->get();

view('notes/index.view.php', [
    'heading' => 'My Notes',
    'notes' => $notes
]);