<?php

namespace App\Interfaces;

interface TelegramServiceInterface
{
    public static function sendMessage(
        int|string $status,
        int|string $totalTime,
    ): void;

    public static function sendFiles(string $filename): void;
}
