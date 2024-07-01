<?php
// File: app/Jobs/SendApprovalEmail.php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Anggota;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovalEmail;

class SendApprovalEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $anggota;
    protected $pendaftar;

    public function __construct(Anggota $anggota, User $pendaftar)
    {
        $this->anggota = $anggota;
        $this->pendaftar = $pendaftar;
    }

    public function handle()
    {
        $url = route('approve.email', ['token' => $this->anggota->verification_token]);
        Mail::to($this->pendaftar->email)->send(new ApprovalEmail($this->anggota, $this->pendaftar, $url));
    }
}
