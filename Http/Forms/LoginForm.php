<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm extends Form
{
    public function __construct(public array $attributes)
    {
        $this->errors = [];
        if (!Validator::email($this->attributes['email'])) {
            $this->errors['email'] = 'Please provided a valid email.';
        }

        if (!Validator::string($this->attributes['password'])) {
            $this->errors['password'] = 'Password provide a password at least to be 7 character.';
        }

    }
}