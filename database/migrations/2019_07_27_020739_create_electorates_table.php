<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectoratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electorates', function (Blueprint $table) {
            $table->integer('id')->unsigned()->unique()->autoIncrement();
            $table->integer('election_id')->unsigned();
            $table->foreign('election_id')->references('id')->on('federal_elections');
            $table->string('name');
            $table->string('state_territory');
            $table->text('header')->nullable();
            $table->text('date_description')->nullable();
            $table->text('mp_description')->nullable();
            $table->longText('profile_description')->nullable();
            $table->longText('history_description')->nullable();
            $table->longText('past_results_description')->nullable();
            $table->text('enrolment_description')->nullable();
            $table->longText('opinion_polls_description')->nullable();
            $table->longText('ballot_paper');
            $table->longText('htv_card_description')->nullable();
            $table->integer('winning_party')->unsigned()->nullable();
            $table->foreign('winning_party')->references('id')->on('federal_election_parties');
            $table->string('abc_prediction');
            $table->boolean('decided')->default(false);
            $table->boolean('changing_hands')->default(false);
            $table->string('held_by');
            $table->integer('held_by_percentage');
            $table->integer('electors');
            $table->integer('counted_votes')->default(0);
            $table->integer('informal_votes')->default(0);
            $table->dateTime('last_update')->nullable();
            $table->string('slug');
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
        Schema::dropIfExists('electorates');
    }
}
