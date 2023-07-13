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
                    $response = Http::get($url['url']);
                    $site->checks()->create([
                        'result' => json_encode([
                            'status' => 'ok',
                            'url' => $url['url']
                        ]),
                        'status_code' => $response->status(),
                        'response_time' => 12,
                        'headers' => json_encode($response->headers()),
                        'frequency' => 1
                    ]);
                } catch (\Exception $e) {
                    // Create failed check record
                    $site->checks()->create([
                        'result' => json_encode([
                            'status' => 'failed',
                            'url' => $url
                        ]),
                        'status_code' => null,
                        'response_time' => null,
                        'headers' => json_encode([]),
                        'error' => $e->getMessage(),
                        'frequency' => 1
                    ]);
                }
            }
        }
    }
}
