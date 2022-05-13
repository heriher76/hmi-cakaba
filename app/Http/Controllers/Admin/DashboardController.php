<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahKomisariat = DB::table('komisariat')->count();
        $jumlahKahmi = User::whereHas("roles", function($q){ $q->where("name", 'kahmi'); })->count();
        $jumlahKader = User::whereHas("roles", function($q){ $q->where("name", 'kader'); })->count();
        $jumlahPendaftarLK = User::whereHas("roles", function($q){ $q->where("name", 'publik'); })->count();
        $komisariatLK = DB::table('komisariat')->where('buka_lk', 1)->get();
        $jumlahKategoriBerita = DB::table('news_categories')->count();

        return view('admin.dashboard', compact('jumlahKomisariat', 'jumlahKahmi', 'jumlahKader', 'jumlahPendaftarLK', 'komisariatLK', 'jumlahKategoriBerita'));
    }
}
