<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\user;
class GoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = user::where('google_id',$user->getId())->first();

            if($findUser){
                Auth::login($findUser);
                return redirect()->intended('dashboard');
            }else{
                user::create([
                    'email'         =>  $user->getEmail(),
                    'password'      =>  Hash::make('contoh123'),
                    'countDiskon'   =>  0,
                    'google_id'     => $user->getId()
                ]);
                return redirect('/register')->with('success-message','Berhasil buat akun');

            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}