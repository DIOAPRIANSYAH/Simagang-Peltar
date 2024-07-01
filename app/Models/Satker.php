<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KegiatanSatker;
use Illuminate\Support\Facades\Crypt;

class Satker extends Model
{
    use HasFactory;

    protected $table = 'satker';

    protected $fillable = ['nama_satker', 'deskripsi', 'foto']; // Tambahkan 'foto' ke dalam $fillable

    public function kegiatanSatker()
    {
        return $this->hasMany(KegiatanSatker::class, 'id_satker');
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
