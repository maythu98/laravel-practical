<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormSubmittedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $publicForm;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($publicForm)
    {
        $this->publicForm = $publicForm;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Surveys and Questionnaires Form')
                    ->markdown('emails.public-forms.submitted');
    }
}
