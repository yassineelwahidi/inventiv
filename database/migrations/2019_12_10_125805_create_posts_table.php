<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',255);
            $table->mediumText('text');
            $table->bigInteger('created_by')->unsigned();
            $table->boolean('is_published');
            $table->bigInteger('published_by')->unsigned();
            $table->timestamps();

//            $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
//            $table->foreign('published_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
