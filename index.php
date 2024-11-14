<?php

require 'functions.php';
//require 'route.php';
require 'Database.php';

$db = new Database();

$posts = $db->query('SELECT * FROM posts')->fetchAll();

foreach ($posts as $post) {
    echo '<pre>';
    echo 'Title: ' . $post['title'] . 'Description: ' . $post['description'];
    echo '</pre>';
}
