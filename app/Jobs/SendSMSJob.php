<?php

namespace App\Jobs;

use App\Mail\LoggerMail;
use App\Mail\WelcomeUserMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Patrickmaken\AvlyText\Client as AVTClient;
use Throwable;

class SendSMSJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $message;
    public $numbers;
    public $api_key = 'otX7KKE2Vrn9wgECHEWqNXjEX0FPclRsM1rIpqOwEW1BH2rUsJKbUvC0HI8gXIBb4KM=';
    public $senderID = 'Kotto';
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($message, $numbers)
    {
        $this->message = $message;
        $this->numbers = $numbers;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->numbers as $number) {
            try {
                AVTClient::sendSMS($number, $this->message, $this->senderID, $this->api_key);
            } catch (Throwable $th) {
                Mail::to('yvesjordan06@gmail.com')->send(new LoggerMail($th));
            }
        }
    }

    public function failed(Throwable $exception)
    {
        Mail::to('yvesjordan06@gmail.com')->send(new LoggerMail($exception));
    }
}
