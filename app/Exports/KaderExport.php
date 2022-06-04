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

class KaderExport implements FromQuery,ShouldAutoSize,WithColumnFormatting,WithHeadings,WithStyles
{
    public function __construct($slug)
    {
        $this->slug = $slug;
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
        return ["No", "Nama", "Email", "Tgl Verifikasi Email", "Tgl Dibuat", "Tgl Terbarui", "Tempat, Tgl Lahir", "Alamat Sekarang", "Alamat Asal", "Jenis Kelamin", "No HP", "Hobi", "Jurusan", "Fakultas", "Angkatan Mhs", "Angkatan LK", "Komisariat Asal LK", "Riwayat Pendidikan", "Riwayat Organisasi", "URL Foto", "Alasan Daftar LK", "Pekerjaan", "Sudah LK1", "Sudah LK2", "Sudah LK3", "Tidak LK"];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }
}
