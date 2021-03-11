<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->boolean('verify')->nullable()->default(false);
            $table->string('city')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->float('rating')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable()->default(null);
            $table->timestamps();
        });

        User::create([
            'first_name' => 'Admin',
            'verify' => true,
            'email' => 'admin@poputi.com',
            'password' => 'rootroot'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
