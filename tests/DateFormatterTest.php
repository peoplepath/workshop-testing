<?php declare(strict_types=1);

namespace IW\Test\Workshop;

use PHPUnit\Framework\TestCase;

use IW\Workshop\DateFormatter;
use DateTime;

final class DateFormatterTest extends TestCase
{
    public function partsOfDayProvider() {
        return [
            ['00:00:01', 'Night'],
            ['05:59:59', 'Night'],
            ['06:00:00', 'Morning'],
            ['11:00:00', 'Morning'],
            ['12:00:00', 'Afternoon'],
            ['17:00:00', 'Afternoon'],
            ['18:00:00', 'Evening'],
            ['23:00:00', 'Evening'],
        ];
    }

    /**
     * @dataProvider partsOfDayProvider
     */
    public function testGetPartOfDay($time, $partOfDay) {
        $dateFormatter = new DateFormatter();

        $this->assertEquals($partOfDay, $dateFormatter->getPartOfDay(new DateTime($time)));
    }
}
