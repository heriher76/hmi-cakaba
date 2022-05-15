<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class PendaftarLKController extends Controller
{
    public function index()
    {
        $komisariat = DB::table('komisariat')->where('id', auth()->user()->admin_id_komisariat)->first();

        $users = DB::table('users')->where('komisariat_lk', $komisariat->slug)->where('tidak_lk', null)->where('sudah_lk1', null)->get();

        return view('admin.pendaftar-lk.index', compact('komisariat', 'users'));
    }

    public function show($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        return view('admin.pendaftar-lk.show', compact('user'));
    }

    public function sudahLK($id)
    {
        DB::table('users')->where('id', $id)->update([
            'sudah_lk1' => 1,
            'updated_at' => Carbon::now()
        ]);

        alert()->success('Berhasil mengubah menjadi sudah LK', '');
        return back();
    }

    public function tidakLK($id)
    {
        DB::table('users')->where('id', $id)->update([
            'tidak_lk' => 1,
            'updated_at' => Carbon::now()
        ]);

        alert()->info('Berhasil mengubah menjadi belum pernah LK', '');
        return back();
    }
}
