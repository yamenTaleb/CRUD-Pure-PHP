<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUser = 8;

$notes = $db->query('SELECT * FROM notes WHERE user_id = :id', [
    'id' => $currentUser
])->get();

view('notes/index.view.php', [
    'heading' => 'My Notes',
    'notes' => $notes
]);