<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCameraCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camera_category', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('camera_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('camera_id')->references('id')->on('cameras');
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('camera_category');
    }
}
