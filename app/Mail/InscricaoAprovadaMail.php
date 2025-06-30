<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Curso;

class InscricaoAprovadaMail extends Mailable
{
    use Queueable, SerializesModels;
    public function __construct(public Curso $curso)
{
    $this->curso = $curso;
}

public function build()
{
    return $this->subject('Sua inscrição foi aprovada!')->view('emails.inscricao_aprovada')->with(['curso' => $this->curso]);
}
}
