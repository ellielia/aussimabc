<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateByElectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('by_elections', function (Blueprint $table) {
            $table->integer('id')->unsigned()->unique()->autoIncrement();
            $table->year('year');
            $table->string('electorate');
            $table->date('polling_day');
            $table->text('caption');
            $table->text('thumbnail');
            $table->text('margin_description')->nullable();
            $table->text('date_description')->nullable();
            $table->text('mp_description')->nullable();
            $table->longText('profile_description')->nullable();
            $table->longText('history_description')->nullable();
            $table->longText('past_results_description')->nullable();
            $table->text('enrolment_description')->nullable();
            $table->longText('opinion_polls_description')->nullable();
            $table->longText('ballot_paper');
            $table->longText('htv_card_description')->nullable();
            $table->integer('winning_candidate')->unsigned()->nullable();
            $table->string('abc_prediction');
            $table->integer('electors');
            $table->integer('counted_votes')->default(0);
            $table->integer('informal_votes')->default(0);
            $table->integer('swing')->default(0);
            $table->string('swing_hex')->default("#FFF");
            $table->string('swing_party')->nullable();
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
        Schema::dropIfExists('by_elections');
    }
}
