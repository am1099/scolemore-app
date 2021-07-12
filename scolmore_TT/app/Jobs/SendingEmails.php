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
use Log;

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

        Mail::send('emails.emailTemplate', ['name' => Auth::user()->name, 'msg' => $this->msg], function ($message) {
            $message->to($this->msg_to);
            $message->subject($this->subject);
        });

      FacadesLog::info('Email sent ');
    }
}
