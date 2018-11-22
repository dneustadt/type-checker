<?php

namespace TypeChecker\Components;

class TypeCheckerReflectionFunction extends \ReflectionFunction
{
    use TypeCheckerReflectionTrait;

    /**
     * @var string
     */
    protected $functionName;

    /**
     * @param string $function
     *
     * @throws \ReflectionException
     */
    public function __construct(string $function)
    {
        $this->functionName = $function;

        parent::__construct($function);
    }
}
