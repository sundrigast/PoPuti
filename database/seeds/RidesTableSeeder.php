<?php

use Illuminate\Database\Seeder;
use App\Models\Ride;

class RidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Ride::class, 20)->create();
    }
}
