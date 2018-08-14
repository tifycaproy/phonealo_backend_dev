<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class pamigosMail extends Mailable
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
        $email_amigo = $request['email_amigo'];
        $nombre_amigo = $request['nombre_amigo'];

        return $this->from('contact@phonealo.com')
                    ->view('frontend.mail.mailPamigo')
                    ->with([
                            'email_amigo' => $email_amigo,
                            'nombre_amigo' => $nombre_amigo
                      ])
                    ->subject('¡Participa Conmigo!');  
    }
}
