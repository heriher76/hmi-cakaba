<?php

namespace App\Http\Controllers\TrainingRaya;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use App\User;
use DB;

class DaftarController extends Controller
{
    public function index()
    {
        $list_training = DB::table('training_raya_kategori')->get();

        return view('training-raya.register', compact('list_training'));
    }

    public function store(Request $request)
    {
        $training = DB::table('training_raya_kategori')->where('id', $request->training)->first();

        if (empty($training)) {
            alert()->error('Link Anda Sepertinya Salah', 'Silahkan cek kembali pilihan training.');

            return back();
        }
        
        $check_email = DB::table('users')->where('email', $request->email)->first();

        if (!empty($check_email)) {
            alert()->error('Email telah terdaftar', 'Silahkan isi kembali menggunakan email berbeda.');

            return back();
        }

        $filePhoto = $request->file('photo');
        $namePhoto = time().'_'.$filePhoto->getClientOriginalName();
        $filePhoto->move(public_path().'/training-raya/photo/', $namePhoto);

        $thumbnailPhoto = '/training-raya/photo/'.$namePhoto; 
        
        $fileSertif = $request->file('sertifikat_lk1');
        $nameSertif = time().'_'.$fileSertif->getClientOriginalName();
        $fileSertif->move(public_path().'/training-raya/sertifikat-lk1/', $nameSertif);

        $thumbnailSertifikat = '/training-raya/sertifikat-lk1/'.$nameSertif;        

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'ttl' => $request->ttl,
            'asal_cabang' => $request->asal_cabang,
            'photo' => $thumbnailPhoto,
            'sertifikat_lk1' => $thumbnailSertifikat,
            'sudah_lk1' => 0,
            'sudah_lk2' => 0,
            'sudah_lk3' => 0,
            'tidak_lk' => 0,
            'training_raya_status_lulus_daftar' => 0,
            'training_raya_status_lulus_forum' => 0,
            'training_raya_kategori_id' => $request->training
        ]);

        if ($request->training == 1) {
            $kategori_training = 'user-lk2';
        }elseif ($request->training == 2) {
            $kategori_training = 'user-lkk';
        }elseif ($request->training == 3) {
            $kategori_training = 'user-sc';
        }
        
        $role = Role::where('name', $kategori_training)->first();
   
        $user->assignRole([$role->id]);

        event(new Registered($user));

        alert()->html('Berhasil Daftar!', "Terimakasih, silahkan cek email untuk verifikasi akun. Dan silahkan login ke website untuk mendapatkan informasi lebih lanjut.", 'success')->autoClose(50000);
        return redirect('/');
    }
}
