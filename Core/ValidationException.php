<?php

namespace Core;

use \Exception;

class ValidationException extends Exception
{

    public readonly array $errors;
    public readonly array $attributes;
    public static function throw(array $errors, array $attributes): static
    {
        $instance = new static();

        $instance->errors = $errors;
        $instance->attributes = $attributes;

        throw $instance;
    }
}