<?php

declare(strict_types=1);

namespace App\Libraries\Series;

class SerieIntervals extends Serie
{
    /**
     * Intervals
     *
     * @var array
     */
    private array $intervals;

    /**
    * Constructor
    *
    * @param array $intervals Intervals
    */
    function __construct(array $intervals = [])
    {
        $this->setIntervals($intervals);
    }

    /**
    * Get intervals
    *
    * @return array
    */
    public function getIntervals(): array
    {
        return $this->intervals;
    }

    /**
    * Set intervals
    *
    * @param array $intervals
    *
    * @return SerieIntervals
    *
    * @throws InvalidArgumentException
    */
    public function setIntervals(array $intervals): SerieIntervals
    {
        foreach ($intervals as $interval) {
            if (!($interval instanceof IntervalInterface)) {
                throw new \InvalidArgumentException('Not an instance of interval.');
            }

            $this->setInterval($interval);
        }

        return $this;
    }

    /**
    * Set interval
    *
    * @param IntervalInterface $interval 
    *
    * @return SerieIntervals
    */
    public function setInterval(IntervalInterface $interval): SerieIntervals
    {
        $this->intervals[] = $interval;

        return $this;
    }

    /**
    * Reset intervals
    *
    * @return SerieIntervals
    */
    public function resetIntervals(): SerieIntervals
    {
        $this->intervals = [];

        return $this;
    }

    /**
    * Find closer interval
    *
    * @param int $timestamp 
    *
    * @return Interval|null
    */
    public function findCloserInterval(int $timestamp): ?Interval
    {
        $intervals = $this->getIntervals();

        if (count ($intervals) === 0) {
            return null;
        }

        $closerInterval = null;

        foreach ($intervals as $interval) {
            if (!$closerInterval) {
                $closerInterval = $interval;
                continue;
            }

            $previousTime = strtotime($closerInterval->intervalNextDate($timestamp));
            $currentTime  = strtotime($interval->intervalNextDate($timestamp));

            $previousDiff = $previousTime - $timestamp;
            $currentDiff  = $currentTime - $timestamp;

            if ($currentDiff > 0 && $currentDiff < $previousDiff) {
                $closerInterval = $interval;
            }
        }

        return $closerInterval;
    }
}

?>