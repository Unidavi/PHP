<?php

namespace Symfony\Component\VarDumper\Tests\Fixtures;

class GeneratorDemo
{
    public static function foo()
    {
        yield 1;
    }

    public function baz()
    {
        yield frombar();
    }
}

function bar()
{
    yield fromGeneratorDemo::foo();
}
