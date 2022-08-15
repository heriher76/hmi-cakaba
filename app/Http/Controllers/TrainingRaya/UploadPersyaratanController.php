<?php

namespace App\Http\Controllers\TrainingRaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class UploadPersyaratanController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();

        $user = \Auth::user();

        if ($user->training_raya_kategori_id != 3) {
            (isset($input['file_jurnal'])) ? $namaThumbnailJurnal = 'training-raya/file-jurnal/'.\Str::random(16).'.'.$input['file_jurnal']->getClientOriginalExtension() : true;
    
            if (!empty($input['file_jurnal'])) {
                if (!empty($user->file_jurnal)) {
                    unlink(public_path($user->file_jurnal));
                }
                $input['file_jurnal']->move(public_path('training-raya/file-jurnal'), $namaThumbnailJurnal);
            }

            (isset($input['surat_rekomendasi_training_raya'])) ? $namaThumbnailRekomendasi = 'training-raya/surat-rekomendasi/'.\Str::random(16).'.'.$input['surat_rekomendasi_training_raya']->getClientOriginalExtension() : true;
    
            if (!empty($input['surat_rekomendasi_training_raya'])) {
                if (!empty($user->surat_rekomendasi_training_raya)) {
                    unlink(public_path($user->surat_rekomendasi_training_raya));
                }
                $input['surat_rekomendasi_training_raya']->move(public_path('training-raya/surat-rekomendasi'), $namaThumbnailRekomendasi);
            }

            DB::table('users')->where('id', $user->id)->update([
                'judul_jurnal' => $input['judul_jurnal'],
                'file_jurnal' => $namaThumbnailJurnal ?? $user->file_jurnal,
                'surat_rekomendasi_training_raya' => $namaThumbnailRekomendasi ?? $user->surat_rekomendasi_training_raya,
            ]);
        }elseif ($user->training_raya_kategori_id == 3) {
            (isset($input['file_essay'])) ? $namaThumbnailEssay = 'training-raya/file-essay/'.\Str::random(16).'.'.$input['file_essay']->getClientOriginalExtension() : true;
    
            if (!empty($input['file_essay'])) {
                if (!empty($user->file_essay)) {
                    unlink(public_path($user->file_essay));
                }
                $input['file_essay']->move(public_path('training-raya/file-essay'), $namaThumbnailEssay);
            }

            (isset($input['file_sindikat'])) ? $namaThumbnailSindikat = 'training-raya/file-sindikat/'.\Str::random(16).'.'.$input['file_sindikat']->getClientOriginalExtension() : true;
    
            if (!empty($input['file_sindikat'])) {
                if (!empty($user->file_sindikat)) {
                    unlink(public_path($user->file_sindikat));
                }
                $input['file_sindikat']->move(public_path('training-raya/file-sindikat'), $namaThumbnailSindikat);
            }

            (isset($input['file_sindikat_pilihan'])) ? $namaThumbnailSindikatPilihan = 'training-raya/file-sindikat-pilihan/'.\Str::random(16).'.'.$input['file_sindikat_pilihan']->getClientOriginalExtension() : true;
    
            if (!empty($input['file_sindikat_pilihan'])) {
                if (!empty($user->file_sindikat_pilihan)) {
                    unlink(public_path($user->file_sindikat_pilihan));
                }
                $input['file_sindikat_pilihan']->move(public_path('training-raya/file-sindikat-pilihan'), $namaThumbnailSindikatPilihan);
            }

            (isset($input['surat_rekomendasi_training_raya'])) ? $namaThumbnailRekomendasi = 'training-raya/surat-rekomendasi/'.\Str::random(16).'.'.$input['surat_rekomendasi_training_raya']->getClientOriginalExtension() : true;
    
            if (!empty($input['surat_rekomendasi_training_raya'])) {
                if (!empty($user->surat_rekomendasi_training_raya)) {
                    unlink(public_path($user->surat_rekomendasi_training_raya));
                }
                $input['surat_rekomendasi_training_raya']->move(public_path('training-raya/surat-rekomendasi'), $namaThumbnailRekomendasi);
            }
            
            (isset($input['sertifikat_lk2'])) ? $namaThumbnailSertifLk2 = 'training-raya/sertifikat-lk2/'.\Str::random(16).'.'.$input['sertifikat_lk2']->getClientOriginalExtension() : true;
    
            if (!empty($input['sertifikat_lk2'])) {
                if (!empty($user->sertifikat_lk2)) {
                    unlink(public_path($user->sertifikat_lk2));
                }
                $input['sertifikat_lk2']->move(public_path('training-raya/sertifikat-lk2'), $namaThumbnailSertifLk2);
            }

            DB::table('users')->where('id', $user->id)->update([
                'judul_essay' => $input['judul_essay'],
                'file_essay' => $namaThumbnailEssay ?? $user->file_essay,
                'judul_sindikat' => $input['judul_sindikat'],
                'file_sindikat' => $namaThumbnailSindikat ?? $user->file_sindikat,
                'judul_sindikat_pilihan' => $input['judul_sindikat_pilihan'],
                'file_sindikat_pilihan' => $namaThumbnailSindikatPilihan ?? $user->file_sindikat_pilihan,
                'surat_rekomendasi_training_raya' => $namaThumbnailRekomendasi ?? $user->surat_rekomendasi_training_raya,
                'sertifikat_lk2' => $namaThumbnailSertifLk2 ?? $user->sertifikat_lk2,
            ]);
        }

        alert()->success('Berhasil upload persyaratan', '');
        return back();
    }
}
