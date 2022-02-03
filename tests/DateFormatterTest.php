<?php

namespace IW\Tests\Workshop;

use IW\Workshop\DateFormatter;
use PHPUnit\Framework\TestCase;

class DateFormatterTest extends TestCase
{

    protected static $dateFormatter;

    public function testGetPartOfDay()
    {
        $sampleData = [
            [new \DateTime("2022-01-01T00:00:00+01:00"), "Night"],
            [new \DateTime("2022-01-01T08:00:00+01:00"), "Morning"],
            [new \DateTime("2022-01-01T14:00:00+01:00"), "Afternoon"],
            [new \DateTime("2022-01-01T22:00:00+01:00"), "Evening"]
        ];

        array_map(function (array $line) {
            $this->assertEquals(self::$dateFormatter->getPartOfDay($line[0]), $line[1]);
        }, $sampleData);
    }

    protected function setUp()
    {
        parent::setUp();
        self::$dateFormatter = new DateFormatter();
    }
}
