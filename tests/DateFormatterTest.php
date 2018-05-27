<?php

use PHPUnit\Framework\TestCase;
use IW\Workshop\DateFormatter;

class DateFormatterTest extends TestCase
{

    public function testGetPartOfDay(): void
    {
        $this->assertEquals("Night", DateFormatter::getPartOfDay(new DateTime("2018-05-27 0:00:01")));
        $this->assertEquals("Night", DateFormatter::getPartOfDay(new DateTime("2018-05-27 5:59:01")));

        $this->assertEquals("Morning", DateFormatter::getPartOfDay(new DateTime("2018-05-27 6:00:01")));
        $this->assertEquals("Morning", DateFormatter::getPartOfDay(new DateTime("2018-05-27 11:59:01")));

        $this->assertEquals("Afternoon", DateFormatter::getPartOfDay(new DateTime("2018-05-27 12:00:01")));
        $this->assertEquals("Afternoon", DateFormatter::getPartOfDay(new DateTime("2018-05-27 17:59:01")));

        // evening je od 18 do 24h? OK.
        $this->assertEquals("Evening", DateFormatter::getPartOfDay(new DateTime("2018-05-27 18:01:01")));
        $this->assertEquals("Evening", DateFormatter::getPartOfDay(new DateTime("2018-05-27 23:59:01")));
    }
}