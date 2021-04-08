<?php

use PHPUnit\Framework\TestCase;
use IW\Workshop\Calculator;

class CalculatorTest extends TestCase
{

    public function testAdd(): void
    {
        $this->assertEquals(
            3,
            Calculator::add(1, 2)
        );

        // navic i zaporne hodnoty
        $this->assertEquals(
            -3,
            Calculator::add(-1, -2)
        );
    }

    public function testDivideException(): void
    {
        $this->expectException(InvalidArgumentException::class);

        // zavolat metodu, ktera zpusobi exception
        Calculator::divide(1, 0);
    }

    public function testDivideOne(): void
    {
        $this->assertEquals(
            2,
            Calculator::divide(4, 2)
        );
    }
}
