<?php

namespace App\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class CheckSiteJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        private readonly array|object $site,
    )
    {
    }

    public function handle(): void
    {
        foreach ($this->site->urls as $url) {
            try {
                $start = now();
                $response = Http::get($url['url']);
                $end = now();
                $totalTime = $end->diffInMilliseconds($start);
                $this->site->checks()->create([
                    'result' => json_encode([
                        'status' => 'ok',
                        'url' => $url['url']
                    ]),
                    'status_code' => $response->status(),
                    'response_time' => $totalTime,
                    'headers' => json_encode($response->headers()),
                ]);
            } catch (Exception $e) {
                $this->site->checks()->create([
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
