<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Carbon\Carbon;
use App\User;
use DB;

class DaftarLKController extends Controller
{
    public function index($slug)
    {
        $komisariat = DB::table('komisariat')->where('buka_lk', 1)->where('slug', $slug)->first();

        if (empty($komisariat)) {
            alert()->error('Link Anda Sepertinya Salah', 'Silahkan cek nama komisariat tujuan LK.');

            return redirect('/');
        }

        return view('daftar-lk', compact('komisariat'));
    }

    public function store(Request $request, $slug)
    {
        $komisariat = DB::table('komisariat')->where('buka_lk', 1)->where('slug', $slug)->first();

        if (empty($komisariat)) {
            alert()->error('Link Anda Sepertinya Salah', 'Silahkan cek nama komisariat tujuan LK.');

            return redirect('/');
        }

        $file = $request->file('photo');
        $name = time().'_'.$file->getClientOriginalName();
        $file->move(public_path().'/cakader/'.$komisariat->slug.'/', $name);

        $savedLocation = '/cakader/'.$komisariat->slug.'/'.$name;        

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'ttl' => $request->ttl,
            'alamat_sekarang' => $request->alamat_sekarang,
            'alamat_asal' => $request->alamat_asal,
            'jk' => $request->jk,
            'hobby' => $request->hobby,
            'jurusan' => $request->jurusan,
            'fakultas' => $request->fakultas,
            'angkatan' => $request->angkatan,
            'angkatan_lk' => null,
            'komisariat_lk' => $komisariat->name,
            'riwayat_pendidikan' => $request->riwayat_pendidikan,
            'riwayat_organisasi' => $request->riwayat_organisasi,
            'photo' => $savedLocation,
            'alasan_daftar_lk' => $request->alasan_daftar_lk,
            'pekerjaan' => null,
            'sudah_lk1' => 0,
            'sudah_lk2' => 0,
            'sudah_lk3' => 0,
            'tidak_lk' => 0,
        ]);

        event(new Registered($user));
        
        alert()->success('Berhasil Daftar!', 'Terimakasih, silahkan cek email dan tunggu kami menghubungi anda.');
        return redirect('/');
    }
}
