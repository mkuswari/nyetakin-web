<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->string('thumbnail');
            $table->text('short_description');
            $table->text('long_description')->nullable();
            $table->float('initial_price');
            $table->float('selling_price');
            $table->integer('weight');
            $table->integer('stock');
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
