<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->float('weight')->default(0);
            $table->float('price_bid')->default(0);
            $table->string('reciver_name');
            $table->string('reciver_address');
            $table->string('reciver_phone');
            $table->string('lnglat_start');
            $table->string('lnglat_end');
            $table->tinyInteger('status');
            $table->integer('user_id')->unsigned();
            $table->integer('shipper_id')->unsigned();
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
        Schema::drop('orders');
    }
}
