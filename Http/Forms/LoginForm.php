<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected array $errors = [];

    public function __construct(public array $attributes)
    {
        $this->errors = [];
        if (!Validator::email($this->attributes['email'])) {
            $this->errors['email'] = 'Please provided a valid email.';
        }

        if (!Validator::string($this->attributes['password'])) {
            $this->errors['email'] = 'Password provide a password at least to be 7 character.';
        }

    }

    public static function validate(array $attributes): ValidationException|static
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw(): ValidationException
    {
        return ValidationException::throw($this->getErrors(), $this->attributes);
    }

    public function failed(): bool
    {
        return ! empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function error(string $field, string $message): static
    {
        $this->errors[$field] = $message;

        return $this;
    }
}