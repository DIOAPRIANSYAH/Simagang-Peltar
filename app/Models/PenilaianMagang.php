<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class PenilaianMagang extends Model
{
    use HasFactory;

    protected $table = 'penilaian_magang';

    protected $fillable = [
        'id_magang',
        'id_users',
        'identitas_diri',
        'github',
        'linkedin',
        'instagram',
        'proposal',
        'surat_rekomendasi',
    ];

    public function magang()
    {
        return $this->belongsTo(Magang::class, 'id_magang');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function getEncryptedId()
    {
        return Crypt::encryptString($this->id);
    }

    // Method untuk menemukan Satker berdasarkan ID terenkripsi
    public static function findByEncryptedId($encryptedId)
    {
        try {
            $id = Crypt::decryptString($encryptedId);
            return self::findOrFail($id);
        } catch (\Exception $e) {
            return null; // atau lempar exception jika perlu
        }
    }
}
