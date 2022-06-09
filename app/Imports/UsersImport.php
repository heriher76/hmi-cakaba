<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name' => $row[1],
            'email' => $row[2], 
            'password' => Hash::make('hmicakaba1947'), 
            'ttl' => $row[3],
            'alamat_sekarang' => $row[4],
            'alamat_asal' => $row[5],
            'jk' => $row[6],
            'phone' => $row[7],
            'hobby' => $row[8],
            'jurusan' => $row[9],
            'fakultas' => $row[10],
            'angkatan' => $row[11],
            'angkatan_lk' => $row[12],
            'komisariat_lk' => $row[13],
            'riwayat_pendidikan' => $row[14],
            'riwayat_organisasi' => $row[15],
            'alasan_daftar_lk' => $row[16],
            'pekerjaan' => $row[17],
            'riwayat_penyakit' => $row[18],
            'sumber_informasi' => $row[19],
            'photo' => null,
            'email_verified_at' => Carbon::now(),
            'sudah_lk1' => $row[20],
            'sudah_lk2' => $row[21],
            'sudah_lk3' => $row[22],
            'tidak_lk' => null
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
