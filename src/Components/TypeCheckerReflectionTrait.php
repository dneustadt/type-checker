<?php

namespace TypeChecker\Components;

trait TypeCheckerReflectionTrait
{
    /**
     * @param $type string
     *
     * @return bool
     */
    public function returnTypeIsEqual(string $type): bool
    {
        return (string) $this->getReturnType() === $type;
    }

    /**
     * @param string $class
     *
     * @return bool
     */
    public function returnTypeIsInstanceOf(string $class): bool
    {
        return $this->returnTypeIsEqual($class) ?:
            is_subclass_of((string) $this->getReturnType(), $class);
    }

    /**
     * @param int $position
     *
     * @throws \ReflectionException
     *
     * @return TypeCheckerReflectionParameter
     */
    public function getArgument(int $position): TypeCheckerReflectionParameter
    {
        if ($this instanceof TypeCheckerReflectionMethod) {
            return new TypeCheckerReflectionParameter(
                [$this->className, $this->methodName],
                $position
            );
        }

        return new TypeCheckerReflectionParameter(
            $this->functionName,
            $position
        );
    }
}
