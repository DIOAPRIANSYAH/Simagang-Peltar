<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Crypt;

class Anggota extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'anggota';

    protected $fillable = [
        'id_users', 'id_magang', 'nama',  'tgl_lahir', 'agama', 'jenis_kelamin', 'nama_sekolah',
        'pendidikan', 'jurusan', 'nomor_induk', 'no_hp', 'email', 'password', 'type',
        'sertifikat_kelulusan', 'foto', 'cv', 'link_profile_linkedin',
        'link_profile_instagram', 'provinsi', 'kabupaten', 'kecamatan', 'desa', 'status', 'verification_token', 'is_verified'
    ];

    protected $hidden = ['password', 'remember_token'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function getEncryptedId()
    {
        return Crypt::encryptString($this->id);
    }

    public static function findByEncryptedId($encryptedId)
    {
        try {
            $id = Crypt::decryptString($encryptedId);
            return self::findOrFail($id);
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getAuthIdentifierName()
    {
        return 'email';
    }

    public function isEmailVerified()
    {
        return (bool) $this->is_verified;
    }

    public function magangs()
    {
        return $this->hasMany(Magang::class, 'id_users');
    }
    public function magang()
    {
        return $this->hasOne(Magang::class);
    }


    public function anggotas()
    {
        return $this->hasMany(Anggota::class, 'id_users');
    }
}
