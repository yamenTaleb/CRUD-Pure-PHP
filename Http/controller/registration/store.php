<?php

use Core\RegisteredUser;
use Http\Forms\RegistrationForm;

$form = RegistrationForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

(new RegisteredUser)->create($attributes['email'], $attributes['password']);

redirect('/');
