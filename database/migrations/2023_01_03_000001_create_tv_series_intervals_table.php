<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tv_series_intervals', function (Blueprint $table) {
            $table->unsignedInteger('id_tv_series');
            $table->integer('week_day');
            $table->time('show_time');
            $table->timestamps();
            $table->foreign('id_tv_series')->references('id')->on('tv_series')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tv_series_intervals');
    }
};
