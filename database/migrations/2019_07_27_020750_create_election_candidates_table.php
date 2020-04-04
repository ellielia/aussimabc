<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectionCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('election_candidates', function (Blueprint $table) {
            $table->integer('id')->unsigned()->unique()->autoIncrement();
            $table->string('full_name');
            $table->integer('party_id')->unsigned();
            $table->foreign('party_id')->references('id')->on('federal_election_parties');
            $table->boolean('mp')->default(false);
            $table->text('photo_url');
            $table->text('biography')->nullable();
            $table->text('website_url')->nullable();
            $table->text('htv_url')->nullable();
            $table->integer('electorate_id')->unsigned()->nullable();
            $table->foreign('electorate_id')->references('id')->on('electorates');
            $table->integer('first_preference_votes')->default(0);
            $table->integer('total_votes')->default(0);
            $table->integer('swing')->default(0);
            $table->timestamps();
        });

        Schema::table('electorates', function (Blueprint $table) {
            $table->integer('winning_candidate')->unsigned()->nullable();
            $table->foreign('winning_candidate')->references('id')->on('election_candidates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('election_candidates');
        Schema::table('electorates', function (Blueprint $table) {
            $table->dropColumn('winning_candidate')->unsigned()->nullable();
            $table->dropColumn('winning_candidate')->references('id')->on('election_candidates');
        });
    }
}
