<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if (! Validator::email($email)) {
    $errors['email'] = 'Please provided a valid email.';
}

if (! Validator::string($password, 7, 255)) {
    $errors['email'] = 'Password provide a password at least to be 7 character.';
}

if (! empty($errors)) {
    view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query('SELECT' . ' * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if (! $user) {
    $db->query('INSERT' . ' INTO users (email, password) VALUES (:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
    ]);
    $user = $db->query('SELECT' . ' * FROM users WHERE email = :email', [
        'email' => $email
    ])->find();

    login($user);
}
redirect('/');
