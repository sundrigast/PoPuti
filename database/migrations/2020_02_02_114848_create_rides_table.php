<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('position');
            $table->float('from_lat', 8, 6);
            $table->float('from_lng', 8, 6);
            $table->string('destination');
            $table->float('to_lat', 8, 6);
            $table->float('to_lng', 8, 6);
            $table->bigInteger('price');
            $table->text('comment')->nullable();
            $table->dateTime('start_at')->nullable();
            $table->dateTime('finish_at')->nullable();
            $table->time('ride_duration')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->unsignedBigInteger('status_id')->nullable()->default(1);

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');

            $table->foreign('driver_id')
            ->references('id')->on('users')
            ->onDelete('cascade');

            $table->foreign('status_id')
            ->references('id')->on('ride_statuses')
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
        Schema::dropIfExists('rides');
    }
}
