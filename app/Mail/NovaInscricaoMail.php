<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NovaInscricaoMail extends Mailable
{
    use Queueable, SerializesModels;
   public $curso;

    public function __construct($curso)
    {

        $this->curso = $curso;
    }

    public function build()
{
    return $this->subject('Nova Solicitação de Inscrição Recebida')->view('emails.nova_inscricao')->with(['curso' => $this->curso]);
}
}
