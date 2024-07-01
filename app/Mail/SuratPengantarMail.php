<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SuratPengantarMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $filePath;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($user, $filePath)
    {
        $this->user = $user;
        $this->filePath = $filePath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this->view('emails.surat_pengantar')
            ->subject('Surat Pengantar Magang')
            ->attach($this->filePath)
            ->with([
                'user' => $this->user,
            ]);
    }
}
