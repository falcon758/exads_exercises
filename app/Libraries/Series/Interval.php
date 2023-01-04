<?php

declare(strict_types=1);

namespace App\Libraries\Series;

class Interval implements IntervalInterface
{
    /**
     * Day
     *
     * @var int
     */
    private int $weekday;
     
    /**
     * Hour
     *
     * @var string
     */
    private string $hour;

    /**
    * Constructor
    *
    * @param int    $weekday Day of the week
    * @param string $hour    Hour
    */
    function __construct(int $weekday, string $hour)
    {
        $this->setWeekDay($weekday);
        $this->setHour($hour);
    }

    /**
    * Get WeekDay
    *
    * @return int
    */
    public function getWeekday(): int
    {
        return $this->weekday;
    }

    /**
    * Set WeekDay
    *
    * @param int $weekday Day of the week
    *
    * @return IntervalInterface
    */
    public function setWeekDay(int $weekday): IntervalInterface
    {
        $this->weekday = $weekday;

        return $this;
    }

    /**
    * Get Hour
    *
    * @return string
    */
    public function getHour(): string
    {
        return $this->hour;
    }

    /**
    * Set Hour
    *
    * @param string $hour Hour
    *
    * @return IntervalInterface
    */
    public function setHour(string $hour): IntervalInterface
    {
        $this->hour = $hour;

        return $this;
    }

    /**
    * Interval next date
    *
    * @param int $timestamp
    *
    * @return string
    */
    public function intervalNextDate(int $timestamp): string
    {
        $weekday         = $this->getWeekday();
        $hour            = $this->getHour();
        $currentWeekDay  = (int) date('N', $timestamp);
        $currentHour     = date('H:i:s', $timestamp);

        if ($weekday === $currentWeekDay && strtotime($hour) >= strtotime($currentHour)) {
            return date('Y-m-d', $timestamp) . ' ' . $hour;
        }

        $daysRemaining = $weekday - $currentWeekDay;

        if ($daysRemaining <= 0) {
            $daysRemaining = 7 - abs($daysRemaining);
        }

        $nextTimeStamp = strtotime('+'. $daysRemaining . ' days', $timestamp);

        return date('Y-m-d', $nextTimeStamp) . ' ' . $hour;
    }
}

?>