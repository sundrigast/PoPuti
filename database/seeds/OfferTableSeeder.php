<?php

use Illuminate\Database\Seeder;
use App\Models\Offer;

class OfferTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Offer::class, 60)->create();
    }
}
