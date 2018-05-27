<?php declare(strict_types=1);

namespace IW\Tests\Workshop;

use InvalidArgumentException;
use IW\Workshop\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{

    public function testAdd(): void
    {
        $calculator = new Calculator();

        $this->assertEquals(-5.5, $calculator->add(-15.75, 10.25));
    }

    public function testDivide(): void
    {
        $calculator = new Calculator();

        $this->assertEquals(0.5, $calculator->divide(1, 2));
    }

    public function testThrowDivisionByZeroException(): void
    {
        $calculator = new Calculator();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Division by zero');
        $calculator->divide(100, 0);
    }
}
