<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Magang extends Model
{
    use HasFactory;

    protected $table = 'magang';

    protected $fillable = [
        'id_projek',
        'id_users',
        'fakultas',
        'nomor_surat_rekomendasi',
        'alamat_kampus',
        'surat_rekomendasi',
        'status',
        'surat_pengantar',
        'proposal',
        'dosen_pembimbing_lapangan',
        'dosen_pembimbing_kampus',
        'satuan_kerja',
        'tanggal_mulai',
        'tanggal_berakhir',
    ];

    public function projek()
    {
        return $this->belongsTo(Projek::class, 'id_projek');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }

    public function ketua()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    // Method untuk mendapatkan ID terenkripsi
    public function getEncryptedId()
    {
        return Crypt::encryptString($this->id);
    }

    // Method untuk menemukan Magang berdasarkan ID terenkripsi
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
