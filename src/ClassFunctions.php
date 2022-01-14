<?php

namespace Burger\Common;

class ClassFunctions
{
    // turn 'Foo\Bar\Baz\Class' into 'Class'
    public static function short($object)
    {
        $parts = explode('\\', self::fqcn($object));
        return end($parts);
    }

    public static function fqcn($object)
    {
        if (is_string($object)) {
            return str_replace('.', '\\', $object);
        }

        if (is_object($object)) {
            return trim(get_class($object), '\\');
        }

        throw new InvalidArgumentException(sprintf("Expected an object or a string, got %s", gettype($object)));
    }
}