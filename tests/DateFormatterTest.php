<?php declare(strict_types=1);

namespace IW\Tests\Workshop;

use IW\Workshop\DateFormatter;
use PHPUnit\Framework\TestCase;

class DateFormatterTest extends TestCase
{

    public function testGetPartOfDay(): void
    {
        $dateFormatter = $this->getMockBuilder(DateFormatter::class)
            ->setMethods(['getCurrentHour'])
            ->getMock();

        $dateFormatter->expects($this->any())->method('getCurrentHour')->willReturn(0, 3, 6, 9, 12, 15, 18, 21, 23);
        $this->assertEquals('Night', $dateFormatter->getPartOfDay());
        $this->assertEquals('Night', $dateFormatter->getPartOfDay());
        $this->assertEquals('Morning', $dateFormatter->getPartOfDay());
        $this->assertEquals('Morning', $dateFormatter->getPartOfDay());
        $this->assertEquals('Afternoon', $dateFormatter->getPartOfDay());
        $this->assertEquals('Afternoon', $dateFormatter->getPartOfDay());
        $this->assertEquals('Evening', $dateFormatter->getPartOfDay());
        $this->assertEquals('Evening', $dateFormatter->getPartOfDay());
        $this->assertEquals('Evening', $dateFormatter->getPartOfDay());
    }
}
