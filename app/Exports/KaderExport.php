<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KaderExport implements FromQuery,ShouldAutoSize,WithColumnFormatting,WithHeadings,WithStyles,WithMapping
{
    public function __construct($slug)
    {
        $this->slug = $slug;
        $this->counter = 1;
    }

    public function map($user): array
    {
        return [
            $this->counter++,
            $user->name,
            $user->email,
            $user->email_verified_at,
            $user->created_at,
            $user->updated_at,
            $user->ttl,
            $user->alamat_sekarang,
            $user->alamat_asal,
            $user->jk,
            $user->phone,
            $user->hobby,
            $user->jurusan,
            $user->fakultas,
            $user->angkatan,
            $user->angkatan_lk,
            $user->komisariat_lk,
            $user->riwayat_pendidikan,
            $user->riwayat_organisasi,
            $user->riwayat_penyakit,
            $user->photo,
            $user->alasan_daftar_lk,
            $user->pekerjaan,
            $user->sumber_informasi,
            $user->sudah_lk1,
            $user->sudah_lk2,
            $user->sudah_lk3,
            $user->tidak_lk,
        ];
    }

    public function query()
    {
        return User::query()->where('komisariat_lk', $this->slug)->where('sudah_lk1', 1);
    }

    public function columnFormats(): array
    {
        return [
            'K' => NumberFormat::FORMAT_NUMBER,
        ];
    }

    public function headings(): array
    {
        return ["No", "Nama", "Email", "Tgl Verifikasi Email", "Tgl Dibuat", "Tgl Terbarui", "Tempat, Tgl Lahir", "Alamat Sekarang", "Alamat Asal", "Jenis Kelamin", "No HP", "Hobi", "Jurusan", "Fakultas", "Angkatan Mhs", "Angkatan LK", "Komisariat Asal LK", "Riwayat Pendidikan", "Riwayat Organisasi", "Riwayat Penyakit", "URL Foto", "Alasan Daftar LK", "Pekerjaan", "Sumber Informasi", "Sudah LK1", "Sudah LK2", "Sudah LK3", "Tidak LK"];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }
}
