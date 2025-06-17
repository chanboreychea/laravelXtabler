<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class SendTelegramMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $token;
    protected $chatId;
    protected $message;

    public function __construct($token, $chatId, $message)
    {
        $this->token = $token;
        $this->chatId = $chatId;
        $this->message = $message;
    }

    // public function handle()
    // {
    //     $botToken = config('services.telegram.bot_token');
    //     $chatId = config('services.telegram.chat_id');

    //     Http::get("https://api.telegram.org/bot{$botToken}/sendMessage", [
    //         'chat_id' => $chatId,
    //         'text' => $this->message,
    //     ]);
    // }

    public function handle()
    {

        $url = "https://api.telegram.org/bot" . $this->token . "/sendMessage?chat_id=" . $this->chatId;
        $url = $url . "&text=" . urlencode($this->message);
        $ch = curl_init();
        $opt_array = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false, // Disable SSL verification
        );
        curl_setopt_array($ch, $opt_array);
        $result = curl_exec($ch);

        if ($result === false) {
            $error = curl_error($ch);
            // Handle the error, e.g., log it or display an error message
            // echo "cURL Error: " . $error;
            return redirect()->back()->with('message', 'Please try again!!.');
        }


        curl_close($ch);
    }
}
