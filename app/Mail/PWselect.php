<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PWselect extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $details;
     public function __construct($details)
     {
       $this->details =  $details;
     }

     /**
      * Build the message.
      *
      * @return $this
      */
     public function build()
     {
         return $this->subject('[중고땅땅] 비밀번호 찾기')->view('emails.pwselect');
     }
}
