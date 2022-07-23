<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'ttl',
        'alamat_sekarang',
        'alamat_asal',
        'jk',
        'hobby',
        'jurusan',
        'fakultas',
        'angkatan',
        'angkatan_lk',
        'komisariat_lk',
        'riwayat_pendidikan',
        'riwayat_organisasi',
        'photo',
        'alasan_daftar_lk',
        'pekerjaan',
        'sudah_lk1',
        'sudah_lk2',
        'sudah_lk3',
        'tidak_lk',
        'asal_cabang',
        'sertifikat_lk1',
        'file_jurnal',
        'ss_hasil_plagiarism',
        'surat_rekomendasi_training_raya',
        'training_raya_status_lulus_daftar',
        'training_raya_status_lulus_forum',
        'training_raya_kategori_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
