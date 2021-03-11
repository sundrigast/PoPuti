<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Driver;
use App\Models\PhoneVerification;

class AddTestUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user = User::create([
            'first_name' => 'Test',
            'phone' => '+7 (999) 999-99-99',
            'verify' => true,
            'email' => 'test@bonch.dev',
        ]);

        $user->verifications()->create([
            'code' => '1111',
        ]);

        $user->driver()->create([
            'car_brand' => 'test_brand',
            'car_model' => 'test model',
            'car_number' => 'A111AA',
            'verify' => true,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        User::firstWhere('first_name', 'Test')
            ->forceDelete();
    }
}
