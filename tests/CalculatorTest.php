<?php declare(strict_types=1);

namespace IW\Test\Workshop;

use PHPUnit\Framework\TestCase;

use IW\Workshop\Calculator;
use InvalidArgumentException;

final class CalculatorTest extends TestCase
{
    private $calculator;

    public function setUp() {
        $this->calculator = new Calculator();
    }

    public function additionProvider() {
        return [
            // [operand, operand, result]
            [1, 1, 2],
            [-1, -2, -3],
            [3.6, -8.5, -4.9],
            [0, 0, 0],
        ];
    }

    /**
     * @dataProvider additionProvider
     */
    public function testAdd($a, $b, $result) {
        $this->assertEquals($result, $this->calculator->add($a, $b));
    }

    public function divisionProvider() {
        return [
            // [operand, operand, result]
            [1, 1, 1],
            [-1, -2, 0.5],
            [1, 3, 1 / 3],
            [1, 7, 1 / 7],
            [100, -10, -10],
            [0.1, 1/10, 1],
        ];
    }

    /**
     * @dataProvider divisionProvider
     */
    public function testDivide($a, $b, $result) {
        $this->assertEquals($result, $this->calculator->divide($a, $b));
    }

    public function testDivideByZero() {
        $this->expectException(InvalidArgumentException::class);

        $this->assertEquals('xxx', $this->calculator->divide(10, 0));
    }
}
