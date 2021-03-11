<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('price');
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->unsignedBigInteger('ride_id')->nullable();
            $table->timestamps();

            $table->foreign('driver_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('ride_id')
                ->references('id')->on('rides')
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
        Schema::dropIfExists('offers');
    }
}
