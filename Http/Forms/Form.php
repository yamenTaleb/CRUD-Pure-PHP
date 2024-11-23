<?php

namespace Http\Forms;

use Core\ValidationException;

class Form
{
    protected array $errors;
    public array $attributes;

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