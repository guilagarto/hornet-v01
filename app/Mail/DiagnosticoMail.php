<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DiagnosticoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
   public function __construct($dados, $pacote)
    {
        $this->dados = $dados;
        $this->pacote = $pacote;
    }
 public function __markdown() {} // Mantendo compatibilidade com versões anteriores se necessário
    /**
     * Get the message envelope.
     */
     public function envelope(): Envelope
    {
        return new Envelope(
            subject: '8ou80 - Seu Diagnóstico Digital está Pronto!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.diagnostico',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
