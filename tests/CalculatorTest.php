<?php

namespace IW\Tests\Workshop;

use IW\Workshop\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    protected static $calculator;

    /**
     * @dataProvider additionProvider
     */
    public function testAdd(float $a, float $b, float $expected)
    {
        $this->assertEquals($expected, self::$calculator->add($a, $b));
    }

    public function additionProvider(): array
    {
        return [
            [0, 0, 0],
            [-1, 1, 0],
            [40, 2, 42],
            [PHP_INT_MIN, PHP_INT_MAX, 0]
        ];
    }

    /**
     * @dataProvider divisionProvider
     */
    public function testDivide(float $a, float $b, float $expected)
    {
        $this->assertEquals($expected, self::$calculator->divide($a, $b));
        $this->expectException(\InvalidArgumentException::class);

        self::$calculator->divide(1, 0);
    }

    public function divisionProvider(): array
    {
        return [
            [1, 1, 1],
            [0, 1, 0]
        ];
    }

    protected function setUp()
    {
        parent::setUp();
        self::$calculator = new Calculator();
    }
}
