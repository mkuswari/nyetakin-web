<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->bigInteger("user_id")->unsigned();
            $table->string('invoice_number');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('province_destination');
            $table->string('city_destination');
            $table->text('address');
            $table->string('zip_code');
            $table->string('courier');
            $table->string('services');
            $table->integer('total_billing');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
