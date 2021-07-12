<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log as FacadesLog;
use Illuminate\Support\Facades\Redis;

class SendingEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $msg;
    public $msg_to;
    public $subject;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($msg, $msg_to, $subject)
    {
        // $this->mail = $mail;
        $this->msg = $msg;
        $this->msg_to = $msg_to;
        $this->subject = $subject;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        // Allow only 1 email every 15 second per user
        Redis::throttle('SendEmailByScolemore')->allow(1)->every(15)->then(function () {
            // Sends email using the emailTemplate passing 3 variables to the template msg, msg_to and subject
            Mail::send('emails.emailTemplate', ['msg' => $this->msg], function ($message) {
                $message->to($this->msg_to);
                $message->subject($this->subject);
            });
        }, function () {
            // Could not obtain lock; this job will be re-queued
            return $this->release(2);
        });

        FacadesLog::info('Email sent ');
    }
}
