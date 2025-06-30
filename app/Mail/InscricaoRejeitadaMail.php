<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Curso;

class InscricaoRejeitadaMail extends Mailable
{
    use Queueable, SerializesModels;

public function __construct(public Curso $curso)
{
}

public function build()
{
    return $this->subject('Resultado da sua inscrição')
                ->view('emails.inscricao_rejeitada')
                ->with(['curso' => $this->curso]);
}

}
