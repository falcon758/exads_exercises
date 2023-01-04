<?php

declare(strict_types=1);

namespace App\Libraries\Series;

interface IntervalInterface
{
    /**
    * Get WeekDay
    *
    * @return int
    */
    public function getWeekday(): int;

    /**
    * Set WeekDay
    *
    * @param int $weekday Day of the week
    *
    * @return IntervalInterface
    */
    public function setWeekDay(int $weekday): IntervalInterface;

    /**
    * Get Hour
    *
    * @return string
    */
    public function getHour(): string;

    /**
    * Set Hour
    *
    * @param string $hour Hour
    *
    * @return IntervalInterface
    */
    public function setHour(string $hour): IntervalInterface;
}

?>