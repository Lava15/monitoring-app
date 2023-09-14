<?php

namespace App\Services\Webhooks;

use App\Interfaces\TelegramServiceInterface;
use Illuminate\Support\Facades\Http;

class TelegramService implements TelegramServiceInterface
{
    public static function sendMessage(
        int|string $status,
        int|string $totalTime
    ): void
    {
        Http::post(config('telegram.telegram_api_url') . 'bot' . config('telegram.bot_token') . '/sendMessage',
            [
                'chat_id' => (int)config('telegram.chat_id'),
                'text' => "Status code:  $status
                Total time: $totalTime seconds
                ",
                'parse_mode' => 'html'
            ]);
    }

    public static function sendFiles(string $filename): void
    {
        $photo_path = storage_path("app/public/$filename");

        Http::asMultipart()->post(config('telegram.telegram_api_url') . 'bot' . config('telegram.bot_token') . '/sendPhoto',
            [
                'chat_id' => (int)config('telegram.chat_id'),
                'photo' => fopen($photo_path, 'r'),
            ]);


    }


}
