<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\EmailMessages;
use Illuminate\Support\Facades\Mail;


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
        $emails = EmailMessages::orderBy('created_at', 'desc')->get();

        return view('livewire.emails', compact('emails'));
    }

    public function storeMessage()
    {
        // $this->validate([
        //     'message_to' => ['required', 'string', 'email', 'max:60'],
        //     'subject' => ['required', 'string', 'max:45'],
        //     'message' => ['required', 'string', 'max:140'],

        // ], [
        //     'subject.max' => 'Subject is too long, 45 character is the limit',
        //     'message.max' => '140 characters are the limit!!',
        //     'message_to.email' => 'Invalid email address format, please try again'
        // ]);

        $message = new EmailMessages;
        $message->message_from = $this->message_from;
        $message->message_to = $this->message_to;
        $message->subject = $this->subject;
        $message->message = $this->message;
        $message->status = 'N/A';
        $message->save();

        // session()->flash('message', $this->subject, 'message sent successfully.');
    }

    public function sendEmail()
    {

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


        try {
            Mail::send('emails.emailTemplate', ['name' => Auth::user()->name, 'msg' => $this->message], function ($message) {
                $message->to($this->message_to);
                $message->subject($this->subject);
            });
            session()->flash('success', 'your message was sent!');


            // Store the message in the database after the message is sent
            $message = new EmailMessages;
            $message->message_from = Auth::user()->email;
            $message->message_to = $this->message_to;
            $message->subject = $this->subject;
            $message->message = $this->message;
            $message->status = 'N/A';
            $message->save();

            return redirect()->to('/sendEmail');
            // return redirect()->route('emails');


        } catch (\Exception $e) {
            // dd("failed: " . $e);
            session()->flash('error', 'your message was not sent!');
        }
    }

    public function viewEmailsSent()
    {
    }
}
