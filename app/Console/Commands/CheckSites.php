<?php

namespace App\Console\Commands;

use App\Models\Check;
use App\Models\Site;
use Exception;
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
            foreach ($site->urls as $url) {
                try {
                    $start = microtime(true);
                    $response = Http::get($url['url']);
                    $end = microtime(true);
                    dd($response);
                    $responseData = [
                        'status_code' => $response->status(),
                        'response_time' => $end - $start,
                        'headers' => json_encode($response->headers()),
                        'site_id' => $site->id,
                        'frequency' => 50,
                        'result' => '200'
                    ];
                } catch (Exception $e) {
                    // If there is an error, record it
                    $responseData = ['error' => $e->getMessage(), 'site_id' => $site->id];
                }

                Check::query()->create($responseData);
            }
        }
    }
}
