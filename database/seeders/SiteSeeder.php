<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * @return void
     * In local environment data can be added by seeders
     */
    public function run(): void
    {
        Site::query()->create([
            'name' => 'Goggle',
            'urls' => [
                [
                    'Home' => '/',
                    'url' => 'https://google.com'
                ],
            ]
        ]);

        Site::query()->create([
            'name' => 'Example',
            'urls' => [
                [
                    'Home' => '/',
                    'url' => 'https://example.com'
                ],
            ]
        ]);

        Site::query()->create([
            'name' => 'Laravel',
            'urls' => [
                [
                    'Home' => '/',
                    'url' => 'https://laravel.com'
                ],
            ]
        ]);
    }
}
