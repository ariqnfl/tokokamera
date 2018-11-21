<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCameraOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camera_order', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('camera_id');
            $table->unsignedInteger('qty')->default(1);
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('camera_id')->references('id')->on('cameras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('camera_order',function (Blueprint $table){
           $table->dropForeign(['order_id']);
           $table->dropForeign(['camera_id']);
        });
        Schema::dropIfExists('camera_order');
    }
}
