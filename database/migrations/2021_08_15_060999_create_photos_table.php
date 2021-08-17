<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('termin_id')->nullable()->unsigned();
            $table->string('name');
            $table->string('nim');
            $table->string('faculty');
            $table->string('major');
            $table->string('file');
            $table->string('whatsapp');
            $table->timestamps();

            $table->foreign('termin_id')->references('id')->on('termins')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
