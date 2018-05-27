<?php declare(strict_types=1);

namespace IW\Workshop;

use DateTime;

class DateFormatter
{

    public function getCurrentHour(): int
    {
        return (int)(new DateTime())->format('G');
    }

    /**
     * Get current part of the day
     *
     * @return string
     */
    public function getPartOfDay() : string
    {
        $currentHour = $this->getCurrentHour();

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
