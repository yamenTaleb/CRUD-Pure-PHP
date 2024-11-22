<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$db = App::resolve(Database::class);

$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Please provided a valid email.';
}

if (!Validator::string($password)) {
    $errors['email'] = 'Password provide a password at least to be 7 character.';
}

if (!empty($errors)) {
    view('session/create.view.php', [
        'errors' => $errors
    ]);
    die();
}

$user =$db->query('SELECT' . '* FROM users WHERE email = :email', [
    'email' => $email,
])->findOrFail();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login($user);

        redirect('/');
    }
}

view('session/create.view.php', [
    'errors' => [
        'email' => 'No matching account for this email and password.',
    ]
]);
die();
