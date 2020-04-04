<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectionRetiringMPSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('election_retiring_m_p_s', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->string('name');
            $table->string('party');
            $table->string('party_hex');
            $table->longText('bio');
            $table->text('photo');
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
        Schema::dropIfExists('election_retiring_m_p_s');
    }
}
