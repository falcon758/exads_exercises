<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TVSeriesSeeder extends Seeder
{
    const TVSERIES = [
        [
            'id'      => 1,
            'title'   => 'A good serie',
            'channel' => 1,
            'gender'  => 'Comedy',
        ],
        [
            'id'      => 2,
            'title'   => 'Another good Serie',
            'channel' => 2,
            'gender'  => 'Drama',
        ],
        [
            'id'      => 3,
            'title'   => 'A Bad Serie',
            'channel' => 3,
            'gender'  => 'horror',
        ],
        [
            'id'      => 4,
            'title'   => 'Another Bad Serie',
            'channel' => 4,
            'gender'  => 'thriller',
        ],
    ];

    /**
     * Seed the tv series database.
     *
     * @return void
     */
    public function run()
    {
        $tvSeries = self::TVSERIES;

        foreach ($tvSeries as $serie) {
            \App\Models\TVSeries::create($serie);
        }
    }
}
