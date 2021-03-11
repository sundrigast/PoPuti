<?php

use Illuminate\Database\Seeder;
use App\Models\RideStatus;

class RideStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(RideStatus::class, 4)->create();
    }
}
