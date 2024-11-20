<?php

namespace Core;

class App
{
    public static Container $container;

    public static function getContainer(): Container
    {
        return self::$container;
    }

    public static function setContainer(Container $container): void
    {
        self::$container = $container;
    }


   public static function resolve(string $key): mixed
   {
       return self::getContainer()->resolve($key);
   }

}