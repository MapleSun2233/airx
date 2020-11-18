<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->enum("type",['A320','300ER']);
            $table->string("from_city");
            $table->date('date');
            $table->time("time");
            $table->string("to_city");
            $table->integer("first_total");
            $table->integer("first_booked")->default(0);
            $table->integer("business_total");
            $table->integer("business_booked")->default(0);
            $table->integer("economic_total");
            $table->integer("economic_booked")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flight');
    }
}
