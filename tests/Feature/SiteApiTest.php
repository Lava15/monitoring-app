<?php


use App\Models\Check;
use App\Models\Site;
use Illuminate\Support\Facades\Http;

it('can load api endpoint', function () {
    $this->getJson('/api/v1/sites')->assertStatus(200);
});

it('can create a site ', function () {
    $site = Site::query()->create([
        'name' => 'Google',
        'urls' => [
            ['endpoint' => 'home', 'url' => 'https://google.com']
        ]
    ]);
    $this->assertDatabaseHas('sites', [
        'name' => $site->name,
    ]);
});

todo('can create a check');
todo('site has many checks');
todo('check belongs to site', function () {
    $site = Site::factory()->create();

    $check = Check::factory()->create(['site_id' => $site->id]);

    $this->assertTrue($site->is($check->site));
});
todo('checks all sites for uptime');
todo('handles failed http calls');
