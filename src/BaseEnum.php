<?php

namespace ArianTron\BaseEnum;

use ReflectionClass;
use ReflectionException;

abstract class BaseEnum
{
    private static array|null $constCacheArray = NULL;

    /**
     * @throws ReflectionException
     */
    public static function isValidName($name, $strict = false): bool
    {
        $constants = self::getConstants();

        if ($strict) {
            return array_key_exists($name, $constants);
        }

        $keys = array_map('strtolower', array_keys($constants));
        return in_array(strtolower($name), $keys);
    }

    /**
     * @throws ReflectionException
     */
    public static function getConstants()
    {
        if (self::$constCacheArray == NULL) {
            self::$constCacheArray = [];
        }
        $calledClass = get_called_class();
        if (!array_key_exists($calledClass, self::$constCacheArray)) {
            $reflect = new ReflectionClass($calledClass);
            self::$constCacheArray[$calledClass] = $reflect->getConstants();
        }
        return self::$constCacheArray[$calledClass];
    }

    /**
     * @throws ReflectionException
     */
    public static function isValidValue($value, $strict = true): bool
    {
        $values = array_values(self::getConstants());
        return in_array($value, $values, $strict);
    }

    public static function toString($val): int|string
    {
        $tmp = new ReflectionClass(get_called_class());
        $a = $tmp->getConstants();
        $b = array_flip($a);

        return $b[$val];
    }
}
