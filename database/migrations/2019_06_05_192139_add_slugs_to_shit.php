<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugsToShit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('slug')->default('as');
            $table->date('date')->nullable();
        });

        Schema::table('article_categories', function (Blueprint $table) {
            $table->string('slug')->default('as');
            $table->date('date')->nullable();
        });

        Schema::table('by_elections', function (Blueprint $table) {
            $table->string('slug')->default('as');
        });

        Schema::table('federal_elections', function (Blueprint $table) {
            $table->string('slug')->default('as');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('date');

        });

        Schema::table('article_categories', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

        Schema::table('by_elections', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

        Schema::table('federal_elections', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

        Schema::table('electorates', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
