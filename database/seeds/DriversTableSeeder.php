<?php

use Illuminate\Database\Seeder;
use App\Models\Driver;

class DriversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Driver::class, 5)->create();
    }
}
