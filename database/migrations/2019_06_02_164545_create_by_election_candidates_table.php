<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateByElectionCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('by_election_candidates', function (Blueprint $table) {
            $table->integer('id')->unsigned()->unique()->autoIncrement();
            $table->string('full_name');
            $table->string('party_name');
            $table->string('party_hex');
            $table->boolean('mp')->default(false);
            $table->text('photo_url');
            $table->text('biography')->nullable();
            $table->text('website_url')->nullable();
            $table->text('htv_url')->nullable();
            $table->integer('by_election_id')->unsigned();
            $table->foreign('by_election_id')->references('id')->on('by_elections');
            $table->integer('first_preference_votes')->default(0);
            $table->integer('total_votes')->default(0);
            $table->integer('swing')->default(0);
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
        Schema::dropIfExists('by_election_candidates');
    }
}
