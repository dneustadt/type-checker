<?php

namespace TypeChecker;

use TypeChecker\Components\TypeCheckerReflectionFunction;
use TypeChecker\Components\TypeCheckerReflectionMethod;

class TypeChecker
{
    /**
     * @param string $function
     *
     * @throws \ReflectionException
     *
     * @return TypeCheckerReflectionFunction
     */
    public static function reflectFunction(
        string $function
    ): TypeCheckerReflectionFunction {
        return new TypeCheckerReflectionFunction($function);
    }

    /**
     * @param string $method
     * @param string $class
     *
     * @throws \ReflectionException
     *
     * @return TypeCheckerReflectionMethod
     */
    public static function reflectMethod(
        string $method,
        string $class
    ): TypeCheckerReflectionMethod {
        return new TypeCheckerReflectionMethod($class, $method);
    }
}
