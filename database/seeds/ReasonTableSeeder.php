<?php

use Illuminate\Database\Seeder;
use App\Models\Reason;

class ReasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Reason::class, 10)->create();
    }
}
