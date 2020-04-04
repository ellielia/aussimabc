<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addsuppelectios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('by_elections', function (Blueprint $table) {
            $table->boolean('supplementary_election')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('by_elections', function (Blueprint $table) {
            $table->dropColumn('supplementary_election');
        });
    }
}
