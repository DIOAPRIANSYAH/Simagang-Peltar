<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Projek extends Model
{
    use HasFactory;

    protected $table = 'projek';

    protected $fillable = [
        'id_magang',
        'judul',
        'jenis',
        'status',
        'link_github',
        'dokumentasi_pengerjaan1',
        'dokumentasi_pengerjaan2',
        'dokumentasi_pengerjaan3'
    ];

    // Define the relationship with the Magang model
    public function magangs()
    {
        return $this->hasMany(Magang::class, 'id_projek');
    }

    public function magang()
    {
        return $this->belongsTo(DetailUser::class, 'id_magang');
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
