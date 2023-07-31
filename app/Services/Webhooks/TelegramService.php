<?php

namespace App\Services\Webhooks;

use App\Interfaces\TelegramServiceInterface;
use Illuminate\Support\Facades\Http;

class TelegramService implements TelegramServiceInterface
{
    protected const BASE_URL = 'https://api.telegram.org/';

    public function sendMessage(): void
    {
        Http::post(self::BASE_URL . 'bot' . env('TELEGRAM_BOT_TOKEN') . '/sendMessage', [
            'chat_id' => (int)env('TELEGRAM_CHAT_ID'),
            'text' => 'testing Demo',
            'parse_mode' => 'html'
        ]);
    }
}
