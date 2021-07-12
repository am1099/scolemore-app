<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\EmailMessages;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use App\Jobs\SendingEmails;


class Emails extends Component
{


    public $message_from;
    public $message_to;
    public $subject;
    public $message;
    public $index = 1;



    public function render()
    {
        // $emails = EmailMessages::all()->sortBy('created_at', 'asc');
        $emails = EmailMessages::where('message_from', Auth::user()->email)->orderBy('created_at', 'desc')->get();
        $users = User::all();


        return view('livewire.emails', compact('emails', 'users'));
    }


    public function sendEmail()
    {
        // Validation for the 'send email' form to make sure all fields are validated with the correct info
        $this->validate([
            'message_to' => ['required', 'string', 'email', 'max:60', 'exists:users,email'],
            'subject' => ['required', 'string', 'max:45'],
            'message' => ['required', 'string', 'max:140'],

        ], [
            'subject.max' => 'Subject is too long, 45 character is the limit',
            'message.max' => '140 characters are the limit!!',
            'message_to.email' => 'Invalid email address format, please try again',
            'message_to.exists' => 'Not a varified email, please enter a varified email.'

        ]);

        // sending the email via mailgun, tested for only specific users due to restriction by mailgun
        try {
            // Mail::send('emails.emailTemplate', ['name' => Auth::user()->name, 'msg' => $this->message], function ($message) {
            //     $message->to($this->message_to);
            //     $message->subject($this->subject);
            // });

            SendingEmails::dispatch($this->message, $this->message_to, $this->subject);

            var_dump('Dispatched email ' . $this->subject);



            // Store the message in the database after the message is sent
            $message = new EmailMessages;
            $message->message_from = Auth::user()->email;
            $message->message_to = $this->message_to;
            $message->subject = $this->subject;
            $message->message = $this->message;
            $message->status = 'sent';
            $message->save();

            // Refresh the page with the correct message
            session()->flash('success', 'your message was sent!');
            return redirect()->to('/sendEmail');
            // return redirect()->route('emails');


        } catch (\Exception $e) {
            // dd("failed: " . $e);
            session()->flash('error', 'your message was not sent!');
        }
    }

    public function emailTracking()
    {
    }
}
