<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->float('weight')->default(0);
            $table->float('price_bid')->default(0);
            $table->string('reciver_name');
            $table->string('reciver_address');
            $table->string('reciver_phone');
            $table->string('longitude_start');
            $table->string('latitude_start');
            $table->string('longitude_end');
            $table->string('latitude_end');
            $table->tinyInteger('status');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::table('order_details', function (Blueprint $table) {
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_details');
    }
}
