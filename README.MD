TypeChecker
=====

Simple implementation for asserting PHP7 scalar type declarations and return types.

`composer require dneustadt/type-checker`

## Example

```php
function test_function(string $foo): string
{
    return '';
}

class TestClass extends ReflectionClass
{
    protected function return_string(): string
    {
        return '';
    }

    protected function return_class(): TestClass
    {
        return $this;
    }

    protected function test_parameters(
        string $foo,
        TestClass $bar
    ): bool {
        unset($foo, $bar);

        return false;
    }
}

\TypeChecker\TypeChecker::reflectFunction('test_function')
        ->returnTypeIsEqual('string');
// true

\TypeChecker\TypeChecker::reflectMethod('return_string', TestClass::class)
        ->returnTypeIsEqual('string');
// true

\TypeChecker\TypeChecker::reflectMethod('return_class', TestClass::class)
        ->returnTypeIsInstanceOf('ReflectionClass');
// true

\TypeChecker\TypeChecker::reflectFunction('test_function')
        ->getArgument(0)
        ->typeIsEqual('bool');
// false

\TypeChecker\TypeChecker::reflectMethod('test_parameters', TestClass::class)
        ->getArgument(1)
        ->typeIsInstanceOf('ReflectionClass');
// true
```