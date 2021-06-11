<?php
//Import Library
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//Import Library Socialite
use Laravel\Socialite\Facades\Socialite;
//Import Model User
use App\Models\user;

class GoogleController extends Controller
{
    //Membuat fungsi Redirect to google
    public function redirectToGoogle(){
        // Return dari library Socialite yakni google
        return Socialite::driver('google')->redirect();
    }
    // Membuat fungsi callback untuk menghandle google saat redirect
    public function handleGoogleCallback()
    {
        // Menggunakan try catch untuk handle Callback
        try {
            // Membuat variable user yang diassign dengan data user google
            $user = Socialite::driver('google')->user();
            // Membuat variable finduser yang diisi dengan mencari user dalam database
            $findUser = user::where('google_id',$user->getId())->first();
            // Jika true maka akan otomatis login
            if($findUser){
                Auth::login($findUser);
                $email = $findUser->email;
                session(['email' => $email]);
                return redirect()->intended('/dashboard');
            }else{
            // jika tidak maka akan membuat user baru dan redirect ke page register
                user::insert([
                    'email'         =>  $user->getEmail(),
                    'password'      => Hash::make('contoh123'),
                    'role'          => 'pembeli',
                    'countDiskon'   =>  0,
                    'google_id'     => $user->getId()
                ]);
                return redirect('/register')->with('success-message','Berhasil buat akun');

            }
        // Catch membuang semua error
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}