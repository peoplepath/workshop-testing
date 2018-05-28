<?php declare(strict_types=1);

namespace IW\Workshop;

use DateTime;

class DateFormatter
{
    /**
     * Get part of a day.
     *
     * @param DateTime $dateTime date and time to be formatted
     * @return string
     */
    public function getPartOfDay(DateTime $dateTime) : string
    {
        $currentHour = $dateTime->format('G');

        if ($currentHour >= 0 && $currentHour < 6)
        {
            return 'Night';
        }

        if ($currentHour >= 6 && $currentHour < 12)
        {
            return 'Morning';
        }

        if ($currentHour >= 12 && $currentHour < 18)
        {
            return 'Afternoon';
        }

        return 'Evening';
    }
}
