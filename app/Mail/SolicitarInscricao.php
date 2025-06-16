<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SolicitarInscricao extends Mailable
{
    use Queueable, SerializesModels;

    public $curso;
    public $estudante;

    /**
     * Cria uma nova instância do e-mail.
     *
     * @return void
     */
    public function __construct($curso, $estudante)
    {
        $this->curso = $curso;
        $this->estudante = $estudante;
    }

    /**
     * Define o envelope do e-mail.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Solicitação de Inscrição no Curso: ' . $this->curso->titulo,
        );
    }

    /**
     * Define o conteúdo do e-mail.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.solicitacao',
            with: [
                'curso' => $this->curso,
                'estudante' => $this->estudante,
            ],
        );
    }

    /**
     * Anexos do e-mail.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}

