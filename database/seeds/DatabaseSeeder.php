<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            PhoneVerificationSeeder::class,
            DriversTableSeeder::class,
            //RideStatusSeeder::class,
            RidesTableSeeder::class,
            SchedulesTableSeeder::class,
            ReviewsTableSeeder::class,
            MessagesTableSeeder::class,
            ReasonTableSeeder::class,
            OfferTableSeeder::class
         ]);
    }
}
