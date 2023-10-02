<?php

namespace App\Traits;

use Illuminate\Database\DatabaseManager;

trait HasDatabase
{
public function __construct(
    private readonly DatabaseManager $database
)
{}

}
