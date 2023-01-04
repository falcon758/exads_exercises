<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\TVSeries;
use App\Models\TVSeriesIntervals;
use Illuminate\Database\Eloquent\Collection;

class TVSeriesRepository extends Repository
{
    /**
     * @param TVSeries $model
     */
    public function __construct(TVSeries $model) {
        parent::__construct($model);
    }

    /**
     * @param int    $weekday
     * @param string $time
     *
     * @return Collection
     */
    public function getSeries(): Collection
    {
        return $this->model()
        ->query()
        ->with('tvSeriesIntervals')
        ->limit(50)
        ->get();
    } 
}
