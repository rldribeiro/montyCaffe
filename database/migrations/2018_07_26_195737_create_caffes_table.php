<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaffesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caffes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->text('description');
            $table->text('name');
            $table->string('logo_url')->default('https://seadreamsexcursions.files.wordpress.com/2014/01/caffe_totc3b2.jpg');
            $table->boolean('status')->default(true);
            $table->text('status_message')->nullable();
            $table->boolean('locked')->default(false);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caffes');
    }
}
