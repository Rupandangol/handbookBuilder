<?php

namespace App\Mail;

use App\Model\Frontend\UserList;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $token = base64_encode(str_random(10));
        UserList::where(['email' => $this->email])->update(['reset_token' => $token]);
        $username = UserList::where(['email' => $this->email])->first()->username;
        $url = url('userReset/' . $token);
        return $this->view('Frontend.mail.forgotPasswordMail', compact('username'))->with('data', $url)->from('info@talentconnects.com.np');
    }
}
