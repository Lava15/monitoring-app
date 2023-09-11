<?php

namespace App\Http\Controllers\Webhooks;

use App\Http\Controllers\Controller;
use App\Interfaces\TelegramServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TelegramWebhhokController extends Controller
{
    public function __construct(protected TelegramServiceInterface $service)
    {
    }

    public function handleMessage()
    {
        $this->service->sendMessage();
    }

//    public function sendPhoto()
//    {
//        $this->service->sendFiles();
//    }
}
