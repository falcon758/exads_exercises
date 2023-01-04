<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_tv_series
 * @property integer $week_day
 * @property string $show_time
 * @property string $created_at
 * @property string $updated_at
 * @property TvSeries $tvSeries
 */
class TVSeriesIntervals extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tv_series_intervals';

    /**
     * @var array
     */
    protected $fillable = ['id_tv_series', 'week_day', 'show_time', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tvSeries()
    {
        return $this->belongsTo('App\Models\TVSeries', 'id_tv_series');
    }
}
