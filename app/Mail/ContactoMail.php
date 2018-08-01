<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class ContactoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $email = $request['email'];
        $tel = $request['tel'];
        $mensaje = $request['mensaje'];


        return $this->from('contact@phonealo.com')
                    ->view('frontend.mail.mailsend')
                    ->with([
                            'email' => $email,
                            'tel' => $tel,
                            'mensaje' => $mensaje,
                      ])
                    ->subject('Mensaje Web');   
    }
}
