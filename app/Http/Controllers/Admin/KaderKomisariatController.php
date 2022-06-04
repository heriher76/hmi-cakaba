<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use App\Exports\KaderExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class KaderKomisariatController extends Controller
{
    public function index()
    {
        $komisariat = DB::table('komisariat')->where('id', auth()->user()->admin_id_komisariat)->first();

        $users = DB::table('users')->where('komisariat_lk', $komisariat->slug)->where('tidak_lk', null)->where('sudah_lk1', 1)->get();

        return view('admin.kader-komisariat.index', compact('komisariat', 'users'));
    }

    public function show($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        return view('admin.kader-komisariat.show', compact('user'));
    }

    public function importExcel(Request $request)
    {
        // validasi
        $this->validate($request, [
            'import-kader-cakaba' => 'required|mimes:csv,xls,xlsx'
        ]);
 
        // menangkap file excel
        $file = $request->file('import-kader-cakaba');

        // import data
        Excel::import(new UsersImport, $file);
 
        // notifikasi dengan session
        alert()->success('Berhasil!','Data kader telah diimport');
 
        // alihkan halaman kembali
        return back();
    }

    public function download()
    {
        $komisariat = DB::table('komisariat')->where('id', auth()->user()->admin_id_komisariat)->first();

        return Excel::download(new KaderExport($komisariat->slug), 'Kader Komisariat '.$komisariat->name.'.xlsx');
    }
}
