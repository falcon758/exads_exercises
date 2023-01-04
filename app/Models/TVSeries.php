<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property integer $channel
 * @property string $gender
 * @property string $created_at
 * @property string $updated_at
 * @property TvSeriesInterval[] $tvSeriesIntervals
 */
class TVSeries extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tv_series';

    /**
     * @var array
     */
    protected $fillable = ['title', 'channel', 'gender', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tvSeriesIntervals()
    {
        return $this->hasMany('App\Models\TVSeriesIntervals', 'id_tv_series');
    }
}
