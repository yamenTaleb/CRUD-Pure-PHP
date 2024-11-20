<?php

namespace Core;

class Container
{
    public array $bindings;

    public function bind($key, mixed $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key): mixed
    {
        if (! array_key_exists($key, $this->bindings))
            throw new \Exception("No matching binging found for {$key}");

        $resolver = $this->bindings[$key];

        return call_user_func($resolver);
    }
}