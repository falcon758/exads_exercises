<?php

declare(strict_types=1);

namespace App\Libraries\Series;

class SeriesIntervals
{
    /**
     * Serie Intervals
     *
     * @var array
     */
    private array $seriesIntervals;

    /**
    * Constructor
    *
    * @param array $serieIntervals Serie intervals
    */
    function __construct(array $seriesIntervals = [])
    {
        $this->setSeriesIntervals($seriesIntervals);
    }

    /**
    * Get series intervals
    *
    * @return array
    */
    public function getSeriesIntervals(): array
    {
        return $this->seriesIntervals;
    }

    /**
    * Set series intervals
    *
    * @param array $seriesIntervals 
    *
    * @return SeriesIntervals
    *
    * @throws InvalidArgumentException
    */
    public function setSeriesIntervals(array $seriesIntervals): SeriesIntervals
    {
        foreach ($seriesIntervals as $serieIntervals) {
            if (!($serieIntervals instanceof SerieIntervals)) {
                throw new \InvalidArgumentException('Not an instance of interval.');
            }

            $this->setSerieIntervals($serieIntervals);
        }

        return $this;
    }

    /**
    * Set serie intervals
    *
    * @param SerieIntervals $serieIntervals 
    *
    * @return SeriesIntervals
    */
    public function setSerieIntervals(SerieIntervals $serieIntervals): SeriesIntervals
    {
        $this->seriesIntervals[] = $serieIntervals;

        return $this;
    }

    /**
     * Find next show
     * 
     * @param int    $timestamp Timestamp
     * @param string $title     Title
     * 
     * @return SerieIntervals|null
     */
    public function findNextShow(int $timestamp, ?string $title = null): ?SerieIntervals
    {
        $seriesIntervals = $this->getSeriesIntervals();

        $foundSerie = null;

        foreach ($seriesIntervals as $serieIntervals) {
            $currentTitle = $serieIntervals->getTitle();

            // See if title matches (when specified)
            if ($title && $title !== $currentTitle) {
                continue;
            }
            
            if (!$foundSerie) {
                $foundSerie = $serieIntervals;
            }

            $closerInterval = $this->findCloserInterval($foundSerie, $serieIntervals, $timestamp);

            if ($closerInterval) {
                $serieIntervals->resetIntervals();
                $serieIntervals->setIntervals([$closerInterval]);
                $foundSerie = $serieIntervals;
            }
        }

        return $foundSerie;
    }

    /**
     * Find closer interval
     * 
     * @param SerieIntervals $previous  Previous series
     * @param SerieIntervals $current   Current series
     * @param int            $timestamp Timestamp
     * 
     * @return SerieIntervals|null
    *
    * @throws InvalidArgumentException
     */
    private function findCloserInterval(SerieIntervals $previous, SerieIntervals $current, int $timestamp): ?Interval
    {
        $previousInterval = $previous->findCloserInterval($timestamp);
        $currentInterval  = $current->findCloserInterval($timestamp);

        if (!$previousInterval || !$currentInterval) {
            return null;
        }

        $previousDiff = strtotime($previousInterval->intervalNextDate($timestamp)) - $timestamp;
        $currentDiff  = strtotime($currentInterval->intervalNextDate($timestamp)) - $timestamp;

        if ($currentDiff > 0 && $currentDiff < $previousDiff) {
            return $currentInterval;
        }

        return null;
    }
}

?>