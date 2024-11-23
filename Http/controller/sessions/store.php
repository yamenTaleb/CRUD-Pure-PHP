<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
]);

$singIn = (new Authenticator)->attempt($attributes['email'], $attributes['password']);

if (! $singIn) {
    $form->error('email', 'NO matching account for that email and password.')->throw();
}

redirect('/');

