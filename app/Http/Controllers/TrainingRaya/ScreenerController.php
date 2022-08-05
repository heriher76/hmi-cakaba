<?php

namespace App\Http\Controllers\TrainingRaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class ScreenerController extends Controller
{
    public function screener_lk2()
    {
        $list_screener = DB::table('training_raya_screener')->where('training_raya_kategori_id', 1)->get();
        $title = 'LK 2';
        $kategori_id = 1;

        return view('admin.training-raya.screener.index', compact('list_screener', 'title', 'kategori_id'));
    }
    
    public function screener_lkk()
    {
        $list_screener = DB::table('training_raya_screener')->where('training_raya_kategori_id', 2)->get();
        $title = 'LKK';
        $kategori_id = 2;

        return view('admin.training-raya.screener.index', compact('list_screener', 'title', 'kategori_id'));
    }
    
    public function screener_sc()
    {
        $list_screener = DB::table('training_raya_screener')->where('training_raya_kategori_id', 3)->get();
        $title = 'SC';
        $kategori_id = 3;

        return view('admin.training-raya.screener.index', compact('list_screener', 'title', 'kategori_id'));
    }

    public function store_screener(Request $request)
    {
        DB::table('training_raya_screener')->insert([
           'nama' => $request->nama,
           'training_raya_kategori_id' => $request->training_raya_kategori_id,
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now(),
        ]);

        alert()->success('Berhasil menambah screener', '');

        return back();
    }

    public function delete_screener($id)
    {
        DB::table('training_raya_screener')->where('id', $id)->delete();

        alert()->info('Hapus screener berhasil', '');

        return back();
    }
}
