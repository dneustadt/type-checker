<?php

namespace TypeChecker\Test;

include __DIR__ . '/test_function.php';

use TypeChecker\TypeChecker;

class TestTypeClass extends \ReflectionClass
{
    protected function return_string(): string
    {
        return '';
    }

    protected function return_class(): TestTypeClass
    {
        return $this;
    }

    protected function test_parameters(
        string $foo,
        TestTypeClass $bar
    ): bool {
        unset($foo, $bar);

        return false;
    }
}

class TypeCheckerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @throws \ReflectionException
     */
    public function testFunctionReturnTypeIsEqual()
    {
        $this->assertTrue(
            TypeChecker::reflectFunction('test_function')
                ->returnTypeIsEqual('string')
        );
    }

    /**
     * @throws \ReflectionException
     */
    public function testMethodReturnTypeIsEqual()
    {
        $this->assertTrue(
            TypeChecker::reflectMethod('return_string', TestTypeClass::class)
                ->returnTypeIsEqual('string')
        );
    }

    /**
     * @throws \ReflectionException
     */
    public function testMethodReturnTypeIsInstanceOf()
    {
        $this->assertTrue(
            TypeChecker::reflectMethod('return_class', TestTypeClass::class)
                ->returnTypeIsInstanceOf('ReflectionClass')
        );
    }

    /**
     * @throws \ReflectionException
     */
    public function testFunctionArgumentTypeIsEqual()
    {
        $this->assertTrue(
            TypeChecker::reflectFunction('test_function')
                ->getArgument(0)
                ->typeIsEqual('string')
        );
    }

    /**
     * @throws \ReflectionException
     */
    public function testMethodArgumentTypeIsInstanceOf()
    {
        $this->assertTrue(
            TypeChecker::reflectMethod('test_parameters', TestTypeClass::class)
                ->getArgument(1)
                ->typeIsInstanceOf('ReflectionClass')
        );
    }
}
