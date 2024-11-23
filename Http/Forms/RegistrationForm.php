<?php

namespace Http\Forms;

use Core\Validator;

class RegistrationForm extends Form
{
    public function __construct(public array $attributes)
    {
        if (! Validator::email($this->attributes['email'])) {
            $this->errors['email'] = 'Please provided a valid email.';
        }

        if (! Validator::string($this->attributes['password'], 7, 255)) {
            $this->errors['password'] = 'Password provide a password at least to be 7 character.';
        }
    }
}