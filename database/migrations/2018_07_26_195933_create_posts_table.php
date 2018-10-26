<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->timestamps();
            $table->text('content');
            $table->string('image_url')->nullable();
            $table->integer('shelf_life');
            $table->boolean('status')->default(true);
            
            $table->integer('repost_counter')->default(0);

            $table->string('source_caffe')->nullable()->default(null);
            $table->string('source_user')->nullable()->default(null);

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('caffe_id')->unsigned();
            $table->foreign('caffe_id')->references('id')->on('caffes')->onDelete('cascade');
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
