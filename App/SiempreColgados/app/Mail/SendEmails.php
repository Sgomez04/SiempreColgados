<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmails extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The demo object instance.
     *
     * @var Data
     * @var pdf
     */
    public $data;
    public $pdf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $pdf)
    {
        $this->data = $data;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('siemprecolgados.company@gmail.com')
            ->view('Mail.mail')
            ->text('Mail.mail_plain')
            ->attachData($this->pdf, 'Nueva_Cuota.pdf', ['mime' => 
            'application/pdf']);
    }
}
