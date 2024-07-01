<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class KegiatanSatker extends Model
{
    use HasFactory;

    protected $table = 'kegiatan_satker';

    protected $fillable = ['id_satker', 'judul_kegiatan', 'deskripsi', 'fotoKegiatan'];

    public function satker()
    {
        return $this->belongsTo(Satker::class, 'id_satker');
    }

    // Method untuk mendapatkan ID terenkripsi
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
