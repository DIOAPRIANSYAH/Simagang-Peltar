<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Encryptable;
use Illuminate\Support\Facades\Crypt;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_users',
        'rate',
        'keterangan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
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
