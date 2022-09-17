<?php

namespace App\Http\Controllers\TrainingRaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class MateriForumController extends Controller
{
    public function materi_forum_lk2()
    {
        $list_materi = DB::table('training_raya_materi_forum')->where('training_raya_kategori_id', 1)->get();
        $title = 'LK 2';
        $kategori_id = 1;

        return view('admin.training-raya.materi-forum.index', compact('list_materi', 'title', 'kategori_id'));
    }
    
    public function materi_forum_lkk()
    {
        $list_materi = DB::table('training_raya_materi_forum')->where('training_raya_kategori_id', 2)->get();
        $title = 'LKK';
        $kategori_id = 2;

        return view('admin.training-raya.materi-forum.index', compact('list_materi', 'title', 'kategori_id'));
    }
    
    public function materi_forum_sc()
    {
        $list_materi = DB::table('training_raya_materi_forum')->where('training_raya_kategori_id', 3)->get();
        $title = 'SC';
        $kategori_id = 3;

        return view('admin.training-raya.materi-forum.index', compact('list_materi', 'title', 'kategori_id'));
    }

    public function store_materi_forum(Request $request)
    {
        DB::table('training_raya_materi_forum')->insert([
           'nama' => $request->nama,
           'training_raya_kategori_id' => $request->training_raya_kategori_id,
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now(),
        ]);

        alert()->success('Berhasil menambah materi', '');

        return back();
    }

    public function delete_materi_forum($id)
    {
        DB::table('training_raya_materi_forum')->where('id', $id)->delete();

        alert()->info('Hapus materi berhasil', '');

        return back();
    }

    public function generate_qr($id)
    {
        $materi = DB::table('training_raya_materi_forum')->where('id', $id)->first();

        return view('admin.training-raya.materi-forum.generate-qr', compact('materi'));
    }
}
