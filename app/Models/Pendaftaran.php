<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'name',
        'user_id',
        'alamat_ktp',
        'alamat_lengkap',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kewarganegaraan',
        'tanggal_lahir',
        'tempat_lahir',
        'propinsi_lahir',
        'kabupaten_lahir',
        'jenis_kelamin',
        'status_menikah',
        'agama',
        'no_telp',
        'no_hp',
        'email_daftar',
        'status_daftar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
