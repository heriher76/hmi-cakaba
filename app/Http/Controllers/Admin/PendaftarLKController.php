<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Exports\PendaftarLKExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class PendaftarLKController extends Controller
{
    public function index()
    {
        $komisariat = DB::table('komisariat')->where('id', auth()->user()->admin_id_komisariat)->first();

        $users = DB::table('users')->where('komisariat_lk', $komisariat->slug)->whereIn('tidak_lk', [null, 0])->whereIn('sudah_lk1', [null, 0])->get();

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

    public function download()
    {
        $komisariat = DB::table('komisariat')->where('id', auth()->user()->admin_id_komisariat)->first();

        return Excel::download(new PendaftarLKExport($komisariat->slug), 'Pendaftar LK1 Kom '.$komisariat->name.'.xlsx');
    }
}
