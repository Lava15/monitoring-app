<?php

namespace App\Console\Commands;

use App\Jobs\CheckSiteJob;
use App\Models\Site;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CheckSites extends Command
{
    protected $signature = 'check:sites';

    protected $description = 'Check all sites for uptime';

    public function handle(): void
    {
        $sites = Site::all();
        foreach ($sites as $site) {
            CheckSiteJob::dispatch($site);
        }
    }
}
