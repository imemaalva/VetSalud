<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;

class HistoryCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    protected $history;
    protected $animalInfo;

    public function __construct($history, $animalInfo)
    {
        $this->history = $history;
        $this->animalInfo = $animalInfo;
    }

    public function build()
    {
        $pdf = Pdf::loadView('pdf.history', ['history' => $this->history]);

        return $this->subject('Nuevo historial médico para tu mascota')
            ->markdown('emails.history.created', [
                'history' => $this->history,
                'animalInfo' => $this->animalInfo,
            ])
            ->attachData($pdf->output(), 'historial.pdf');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'History Created',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.history.created',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
