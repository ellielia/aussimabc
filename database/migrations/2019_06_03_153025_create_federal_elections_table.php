<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFederalElectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('federal_elections', function (Blueprint $table) {
            $table->integer('id')->unsigned()->unique()->autoIncrement();
            $table->year('year');
            $table->string('month');
            $table->date('polling_day');
            $table->text('caption');
            $table->text('thumbnail');
            $table->integer('party_bars_cap');
            $table->integer('majority');
            $table->integer('electors');
            $table->integer('counted_votes')->default(0);
            $table->integer('informal_votes')->default(0);
            $table->dateTime('last_update')->nullable();
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
        Schema::dropIfExists('federal_elections');
    }
}
