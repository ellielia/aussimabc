<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFederalElectionPartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('federal_election_parties', function (Blueprint $table) {
            $table->integer('id')->unsigned()->autoIncrement();
            $table->integer('election_id')->unsigned();
            $table->foreign('election_id')->references('id')->on('federal_elections');
            $table->string('name');
            $table->string('code');
            $table->string('hex');
            $table->boolean('show_on_bars')->default(false);
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
        Schema::dropIfExists('federal_election_parties');
    }
}
