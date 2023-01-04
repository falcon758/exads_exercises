<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TVSeriesIntervalsSeeder extends Seeder
{
    const TVSERIES_INTERVALS = [
        [
            'id_tv_series' => 1,
            'week_day'     => 1,
            'show_time'    => '15:00',
        ],
        [
            'id_tv_series' => 2,
            'week_day'     => 2,
            'show_time'    => '16:00',
        ],
        [
            'id_tv_series' => 3,
            'week_day'     => 3,
            'show_time'    => '17:00',
        ],
        [
            'id_tv_series' => 4,
            'week_day'     => 4,
            'show_time'    => '18:00',
        ],
        [
            'id_tv_series' => 1,
            'week_day'     => 5,
            'show_time'    => '19:00',
        ],
        [
            'id_tv_series' => 2,
            'week_day'     => 6,
            'show_time'    => '20:00',
        ],
        [
            'id_tv_series' => 3,
            'week_day'     => 7,
            'show_time'    => '21:00',
        ],
        [
            'id_tv_series' => 4,
            'week_day'     => 1,
            'show_time'    => '22:00',
        ],
    ];

    /**
     * Seed the tv series database.
     *
     * @return void
     */
    public function run()
    {
        $tvSeriesIntervals = self::TVSERIES_INTERVALS;

        foreach ($tvSeriesIntervals as $intervals) {
            \App\Models\TVSeriesIntervals::create($intervals);
        }
    }
}
