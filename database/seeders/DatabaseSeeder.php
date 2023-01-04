<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the tv series database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TVSeriesSeeder::class);
        $this->call(TVSeriesIntervalsSeeder::class);
    }
}
