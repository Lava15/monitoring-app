<?php

namespace App\Interfaces;

interface TelegramServiceInterface
{
    public function sendMessage(): void;

    public static function sendFiles(string $filename): void;
}
