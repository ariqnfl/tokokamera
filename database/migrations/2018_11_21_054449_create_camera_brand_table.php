<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCameraBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_camera', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('camera_id')->nullable();
            $table->unsignedInteger('brand_id')->nullable();
            $table->foreign('camera_id')->references('id')->on('cameras');
            $table->foreign('brand_id')->references('id')->on('brands');
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
        Schema::dropIfExists('camera_brand');
    }
}
