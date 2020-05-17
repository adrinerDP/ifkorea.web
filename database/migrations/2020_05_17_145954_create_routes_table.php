<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->integer('flight_number');
            $table->unsignedBigInteger('airline_id');
            $table->unsignedBigInteger('dep_airport_id');
            $table->unsignedBigInteger('arr_airport_id');
            $table->time('dep_at');
            $table->time('arr_at');
            $table->char('fleet_type', 4);
            $table->json('day_of_week_status')->comment('요일별 운항 여부');
            $table->json('remarks')->comment('좌석클래스, +1 운항 여부 등');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
}
