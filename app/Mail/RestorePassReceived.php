<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Recover;

class RestorePassReceived extends Mailable
{
   use Queueable, SerializesModels;

   public $recover;
   public $url;

   /**
    * Create a new message instance.
    *
    * @return void
    */
   public function __construct(Recover $r)
   {
       $this->recover = $r;
       $this->url = url('/validar');
   }

   /**
    * Build the message.
    *
    * @return $this
    */
   public function build()
   {
       return $this->subject('Recuperación de contraseña')->view('mail/mail-recover');
   }
}
