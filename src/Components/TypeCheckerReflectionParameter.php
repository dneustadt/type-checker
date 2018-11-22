<?php

namespace TypeChecker\Components;

class TypeCheckerReflectionParameter extends \ReflectionParameter
{
    /**
     * @param string $type
     *
     * @return bool
     */
    public function typeIsEqual(string $type): bool
    {
        return (string) $this->getType() === $type;
    }

    /**
     * @param string $class
     *
     * @return bool
     */
    public function typeIsInstanceOf(string $class): bool
    {
        $interfaces = class_implements((string) $this->getType());

        return $this->typeIsEqual($class) ||
            is_subclass_of((string) $this->getType(), $class) ||
            isset($interfaces[$class]);
    }
}
