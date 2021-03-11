<?php

use Illuminate\Database\Seeder;
use App\Models\PhoneVerification;

class PhoneVerificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PhoneVerification::class, 20)->create();
    }
}
