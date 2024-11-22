<?php

namespace Core;

class Validator
{
    public static function string(string $value, int $min = 1, float $max = INF): bool
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}