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
        
        (isset($input['photo'])) ? $namaThumbnail = 'images/users/'.\Str::random(16).'.'.$input['photo']->getClientOriginalExtension() : null;
        
        if (!empty($input['photo'])) {
            if (!empty($user->photo)) {
                unlink(public_path($user->photo));
            }
            $input['photo']->move(public_path('images/users'), $namaThumbnail);
        }

        if (!empty($input['password']) && !empty($input['c_password'])) {
            if ($input['password'] == $input['c_password']) {
                DB::table('users')->where('id', $id)->update([
                    'password' => bcrypt($input['password'])
                ]);                
            }
        }

        if(!empty($input['confirm-email'])) {
            $confirmed = Carbon::now();
        }

        DB::table('users')->where('id', $id)->update([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => $confirmed ?? $user->email_verified_at,
            'photo' => $namaThumbnail ?? $user->photo
        ]);

        alert()->success('User Berhasil Diupdate!', '...');

        return back();
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
