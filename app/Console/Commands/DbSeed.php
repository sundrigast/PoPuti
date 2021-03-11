<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Console\Seeds\SeedCommand;

class DbSeed extends SeedCommand
{
    /**
     * @return int
     */
    public function handle()
    {
        if (! $this->confirmToProceed()) {
            return 0;
        }

        return parent::handle();
    }
}
