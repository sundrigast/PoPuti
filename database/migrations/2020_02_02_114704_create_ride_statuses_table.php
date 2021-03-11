<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\RideStatus;


class CreateRideStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ride_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->timestamps();
        });


        RideStatus::create([
            'name' => 'Поиск водителя',
        ]);
        RideStatus::create([
            'name' => 'Ожидает водителя',
        ]);
        RideStatus::create([
            'name' => 'Водитель подъехал',
        ]);
        RideStatus::create([
            'name' => 'В пути',
        ]);
        RideStatus::create([
            'name' => 'Пассажир доставлен',
        ]);
        RideStatus::create([
            'name' => 'Поездка отменена',
        ]);
        RideStatus::create([
            'name' => 'Регулярная поездка',
        ]);
        RideStatus::create([
            'name' => 'Поездка архивирована',
        ]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ride_statuses');
    }
}
