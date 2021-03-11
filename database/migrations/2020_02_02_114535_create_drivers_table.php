<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('verify')->nullable()->default(false);
            $table->float('latitude', 8, 6)->nullable();
            $table->float('longitude', 8, 6)->nullable();
            $table->string('passport')->nullable();
            $table->string('drivers_license')->nullable();
            $table->string('car_brand');
            $table->string('car_model');
            $table->string('car_number')->nullable();
            $table->string('registration')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::dropIfExists('drivers');
    }
}
