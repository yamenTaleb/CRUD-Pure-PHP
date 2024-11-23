<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['id'];

$notes = $db->query('SELECT' . ' * FROM notes WHERE user_id = :id', [
    'id' => $currentUserId
])->get();

view('notes/index.view.php', [
    'heading' => 'My Notes',
    'notes' => $notes
]);