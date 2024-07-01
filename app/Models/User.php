<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Crypt;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'google_id',
        'github_id',
        'facebook_id',
        'linkedin_id',
        'email',
        'password',
        'type',
        'tgl_lahir',
        'agama',
        'jenis_kelamin',
        'nama_sekolah',
        'pendidikan',
        'jurusan',
        'nomor_induk',
        'no_hp',
        'sertifikat_kelulusan',
        'foto',
        'status',
        'cv',
        'link_profile_linkedin',
        'link_profile_instagram',
        'id_detail_users',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'desa',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Definisikan relasi hasMany ke model Magang
    public function magangs()
    {
        return $this->hasMany(Magang::class, 'id_users', 'id');
    }
    public function magang()
    {
        return $this->hasOne(Magang::class);
    }
    public function anggotas()
    {
        return $this->hasMany(Anggota::class, 'id_users');
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
        'tgl_lahir' => 'date',
    ];

    /**
     * Interact with the user's type.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ["pendaftar", "pic_satker", "admin"][$value],
        );
    }

    // Method untuk mendapatkan ID terenkripsi
    // Method untuk mendapatkan ID terenkripsi
    public function getEncryptedId()
    {
        return Crypt::encryptString($this->id);
    }

    // Method untuk menemukan User berdasarkan ID terenkripsi
    public static function findByEncryptedId($encryptedId)
    {
        try {
            $id = Crypt::decryptString($encryptedId);
            return self::findOrFail($id);
        } catch (\Exception $e) {
            return null;
        }
    }
}
