<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Symfony\Component\HttpFoundation\Response;

class DatabaseSeeder extends Seeder
{
    /**
     * @return void
     * Seed the application's database.
     */
    public function run(): void
    {
        if (!app()->isProduction()) {
            $this->call([
                SiteSeeder::class,
                DomainSeeder::class,
            ]);
        } else {
            abort(Response::HTTP_NOT_ACCEPTABLE);
        }
    }
}
