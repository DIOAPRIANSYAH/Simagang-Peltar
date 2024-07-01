<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Anggota;
use App\Models\User;

class ApprovalEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $anggota;
    public $pendaftar;
    public $approvalLink;

    public function __construct(Anggota $anggota, User $pendaftar, $approvalLink)
    {
        $this->anggota = $anggota;
        $this->pendaftar = $pendaftar;
        $this->approvalLink = $approvalLink;
    }

    public function build()
    {
        return $this->markdown('emails.approval')
            ->with([
                'anggota' => $this->anggota,
                'pendaftar' => $this->pendaftar,
                'approvalLink' => $this->approvalLink,
            ]);
    }
}
