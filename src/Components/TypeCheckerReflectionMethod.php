<?php

namespace TypeChecker\Components;

class TypeCheckerReflectionMethod extends \ReflectionMethod
{
    use TypeCheckerReflectionTrait;

    /**
     * @var string
     */
    protected $className;

    /**
     * @var string
     */
    protected $methodName;

    /**
     * @param string $class
     * @param string $method
     *
     * @throws \ReflectionException
     */
    public function __construct(
        string $class,
        string $method
    ) {
        $this->className = $class;
        $this->methodName = $method;

        parent::__construct($class, $method);
    }
}
