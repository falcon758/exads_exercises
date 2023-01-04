<?php

declare(strict_types=1);

namespace App\Services;

/**
 * Class TVSeriesService
 *
 * @package App\Services
 */

use App\Libraries\Series\SeriesIntervals;
use App\Libraries\Series\SerieIntervals;
use App\Libraries\Series\Interval;
use App\Repositories\TVSeriesRepository;

class TVSeriesService
{
    /**
     * @var TVSeriesRepository
     */
    private TVSeriesRepository $seriesRepository;

    /**
     * @var Serie
     */
    private SeriesIntervals $seriesIntervals;

    /**
     * @param SeriesIntervals $serieIntervals
     */
    public function __construct(
        TVSeriesRepository $seriesRepository,
        SeriesIntervals $seriesIntervals
    ) {
        $this->seriesRepository = $seriesRepository;
        $this->seriesIntervals   = $seriesIntervals;
    }

    /**
     * Get next show
     *
     * @param int    $timestamp Reference time
     * @param string $title     Title to filter
     * 
     * @return string|null
     * 
     * @throws InvalidArgumentException
     */
    public function getNextShow(?int $timestamp = null, ?string $title = null): ?string
    {
        if (!$timestamp) {
            $timestamp = time();
        }

        $series = $this->seriesRepository->getSeries();

        if ($series->count() === 0) {
            return null;
        }

        foreach ($series->toArray() as $serie) {
            $this->insertSerie($serie);
        }

        $nextShow = $this->seriesIntervals->findNextShow($timestamp, $title);

        $result = null;
        
        if ($nextShow) {
            $nextDate = $nextShow->findCloserInterval($timestamp)->intervalNextDate($timestamp);
            $result   = $nextShow->getTitle() . ' at ' . $nextDate . ' on channel ' . $nextShow->getChannel();
        } 

        return $result;
    }

    /**
     * Build intervals
     *
     * @param array $intervalsData Intervals data
     * 
     * @return array
     */
    private function buildIntervals(array $intervalsData): array
    {
        $intervals = [];

        foreach ($intervalsData as $interval) {
            $intervals[] = new Interval(
                $interval['week_day'],
                $interval['show_time']
            );
        }

        return $intervals;
    }

    /**
     * Insert serie
     * 
     * @return void
     */
    private function insertSerie(array $serie): void
    {
        $serieIntervals = new SerieIntervals();

        $serieIntervals
            ->setTitle($serie['title'])
            ->setChannel($serie['channel'])
            ->setGender($serie['gender'])
            ->setIntervals(
                $this->buildIntervals($serie['tv_series_intervals'] ?? [])
            );
        
        $this->seriesIntervals->setSerieIntervals($serieIntervals);
    }
}
