<?php

namespace App\Http\Controllers\TrainingRaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class InformasiController extends Controller
{
    public function informasi_lk2()
    {
        $list_informasi = DB::table('training_raya_informasi')->where('training_raya_kategori_id', 1)->get();
        $title = 'LK 2';
        $kategori_id = 1;

        return view('admin.training-raya.informasi.index', compact('list_informasi', 'title', 'kategori_id'));
    }
    
    public function informasi_lkk()
    {
        $list_informasi = DB::table('training_raya_informasi')->where('training_raya_kategori_id', 2)->get();
        $title = 'LKK';
        $kategori_id = 2;

        return view('admin.training-raya.informasi.index', compact('list_informasi', 'title', 'kategori_id'));
    }
    
    public function informasi_sc()
    {
        $list_informasi = DB::table('training_raya_informasi')->where('training_raya_kategori_id', 3)->get();
        $title = 'SC';
        $kategori_id = 3;

        return view('admin.training-raya.informasi.index', compact('list_informasi', 'title', 'kategori_id'));
    }

    public function store_informasi(Request $request)
    {
        DB::table('training_raya_informasi')->insert([
           'deskripsi' => $request->deskripsi,
           'tanggal' => $request->tanggal,
           'url' => $request->url,
           'training_raya_kategori_id' => $request->training_raya_kategori_id,
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now(),
        ]);

        alert()->success('Berhasil menambah informasi', '');

        return back();
    }

    public function delete_informasi($id)
    {
        DB::table('training_raya_informasi')->where('id', $id)->delete();

        alert()->info('Hapus informasi berhasil', '');

        return back();
    }
}
