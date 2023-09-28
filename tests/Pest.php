<?php

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Foundation\Testing\TestCase;
use Tests\CreatesApplication;

uses(
    TestCase::class,
    CreatesApplication::class,
    LazilyRefreshDatabase::class,
)->
in(__DIR__);
