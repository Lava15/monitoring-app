<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckDomainExpirations extends Command
{
    protected $signature = 'check:domain-expirations';

    protected $description = 'Checks the expiration dates of domain names';

    public function handle()
    {
        //
    }
}
