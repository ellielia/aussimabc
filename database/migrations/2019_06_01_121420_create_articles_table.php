<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->integer('id')->unsigned()->unique()->autoIncrement();
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('article_categories');
            $table->string('title');
            $table->text('caption');
            $table->string('author');
            $table->string('publication_tag')->nullable();
            $table->dateTime('published_at');
            $table->dateTime('last_edited_at')->nullable();
            $table->text('image_url')->nullable();
        $table->text('youtube_url')->nullable();
        $table->text('image_video_caption')->nullable();
        $table->longText('content');
        $table->text('key_points')->nullable();
        $table->text('topics')->nullable();
        $table->integer('views')->default(0);
        $table->boolean('private')->default(false);
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
        Schema::dropIfExists('articles');
    }
}
