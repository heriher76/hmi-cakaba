<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use DB;

class UsersController extends Controller
{
    public function index($slug)
    {
        $role = DB::table('roles')->where('name', $slug)->first();

        if (empty($role)) {
            alert()->warning('URL tidak valid', '');

            return back();
        }

        $users = User::whereHas("roles", function($q) use($role){ $q->where("name", $role->name); })->get();

        return view('admin.users.index', compact('users', 'role'));
    }

    public function create($slug)
    {
        return view('admin.users.create', compact('slug'));
    }

    public function store(Request $request, $slug)
    {
        $data = $request->all();
        
        if(!empty($data['confirm-email'])) {
            $confirmed = Carbon::now();
        }else
            $confirmed = null;

        $idUser = DB::table('users')->insertGetId([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'email_verified_at' => $confirmed
        ]);

        User::where('id', $idUser)->first()->assignRole($slug);

        alert()->success('Berhasil menambahkan user', '');

        return back();
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug, $id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        return view('admin.users.edit', compact('user', 'slug'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug, $id)
    {
        $input = $request->all();

        $user = DB::table('users')->where('id', $id)->first();

        (isset($input['photo'])) ? $namaThumbnail = 'images/users/'.\Str::random(16).'.'.$input['photo']->getClientOriginalExtension() : true;

        if (!empty($input['photo'])) {
            if (!empty($user->photo)) {
                unlink(public_path($user->photo));
            }
            $input['photo']->move(public_path('images/users'), $namaThumbnail);
        }

        if(!empty($input['confirm-email'])) {
            $confirmed = Carbon::now();
        }

        if (!empty($request->sudah_lk1)) $sudah_lk1 = 1;

        if (!empty($request->sudah_lk2)) $sudah_lk2 = 1;

        if (!empty($request->sudah_lk3)) $sudah_lk3 = 1; 

        if (!empty($request->tidak_lk)) { 
            $sudah_lk1 = 0;
            $sudah_lk2 = 0;
            $sudah_lk3 = 0;
            $tidak_lk = 1;
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
            'alasan_daftar_lk' => $request->alasan_daftar_lk,
            'pekerjaan' => $request->pekerjaan,
            'photo' => $namaThumbnail ?? $user->photo,
            'email_verified_at' => $confirmed ?? $user->email_verified_at,
            'sudah_lk1' => $sudah_lk1 ?? null,
            'sudah_lk2' => $sudah_lk2 ?? null,
            'sudah_lk3' => $sudah_lk3 ?? null,
            'tidak_lk' => $tidak_lk ?? null,
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug, $id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        if (!empty($user->photo)) {
            unlink(public_path($user->photo));
        }

        DB::table('users')->delete($id);
        
        alert()->info('User Berhasil Dihapus!', '...');

        return back();
    }
}
