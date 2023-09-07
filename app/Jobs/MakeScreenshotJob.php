<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Spatie\Browsershot\Browsershot;

class MakeScreenshotJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        private readonly array|object $site,
    )
    {
    }

    public function handle(): void
    {
        foreach ($this->site->urls as $url) {
            $shot = Browsershot::url($url['url'])
                ->setWSEndpoint('ws://chrome:3000')
                ->setScreenshotType('jpeg', 100)
                ->windowSize(600, 800)
                ->screenshot();

            $shotName = $this->site->name . '-' . now()->format('h:i') . '.jpg';

            Storage::drive('public')->put($shotName, $shot);


        }
    }
}
