<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class MyProfileController extends Controller
{
    public function index()
    {
        $me = Auth::user();

        return view('my-profile', compact('me'));
    }

    public function update(Request $request)
    {
        $input = $request->all();

        $user = DB::table('users')->where('id', auth()->user()->id)->first();

        (isset($input['photo'])) ? $namaThumbnail = 'images/users/'.\Str::random(16).'.'.$input['photo']->getClientOriginalExtension() : true;

        if (!empty($input['photo'])) {
            if (!empty($user->photo)) {
                unlink(public_path($user->photo));
            }
            $input['photo']->move(public_path('images/users'), $namaThumbnail);
        }

        DB::table('users')->where('id', $user->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'ttl' => $request->ttl,
            'alamat_sekarang' => $request->alamat_sekarang,
            'alamat_asal' => $request->alamat_asal,
            'jk' => $request->jk,
            'phone' => $request->phone,
            'hobby' => $request->hobby,
            'jurusan' => $request->jurusan,
            'fakultas' => $request->fakultas,
            'angkatan' => $request->angkatan,
            'angkatan_lk' => $request->angkatan_lk,
            'komisariat_lk' => $request->komisariat_lk,
            'riwayat_pendidikan' => $request->riwayat_pendidikan,
            'riwayat_organisasi' => $request->riwayat_organisasi,
            'riwayat_penyakit' => $request->riwayat_penyakit,
            'sumber_informasi' => $request->sumber_informasi,
            'alasan_daftar_lk' => $request->alasan_daftar_lk,
            'pekerjaan' => $request->pekerjaan,
            'photo' => $namaThumbnail ?? $user->photo
        ]);

        if (!empty($input['new_password']) && !empty($input['new_password_confirmation'])) {
            if ($input['new_password'] == $input['new_password_confirmation']) {
                DB::table('users')->where('id', $user->id)->update([
                    'password' => bcrypt($input['new_password'])
                ]);                
                
                alert()->success('Profil Berhasil Diupdate!', '...');
                return back()->with('passwordChanged','Please Login Again.');
            }else{
                alert()->info('Profil Berhasil Diupdate Namun Password Gagal Diperbarui!', 'Password dan Konfirmasi Password Baru Tidak Sama.');
                return back();
            }
        }else{
            alert()->success('Berhasil memperbarui profil.', '');
            return back();
        }
    }
}
