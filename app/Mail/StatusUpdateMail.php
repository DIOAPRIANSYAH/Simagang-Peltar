<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatusUpdateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;
    public $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userName, $status)
    {
        $this->userName = $userName;
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.status_update')
            ->subject('Update Status Magang Anda');
    }
}
