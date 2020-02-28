<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class lawyerMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($companyName,$lawyerName,$user_id)
    {
        $this->companyName=$companyName;
        $this->lawyerName=$lawyerName;
        $this->user_id=$user_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $cName=$this->companyName;
        $lName=$this->lawyerName;
        $url=url('/@admin@/userList/userInfo/'.$this->user_id);
        return $this->view('Frontend.mail.lawyerMail',compact('cName','lName'))->with('data',$url)->from('info@talentconnects.com.np')->subject('Document Builder');
    }
}
