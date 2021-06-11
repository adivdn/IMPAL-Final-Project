<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\profile;

class dashboard extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
    }

    public function profile(){
        $email = session('email');
        $data = DB::table('profiles')
                    ->select(DB::raw('profiles.*'))
                    ->join('users','profiles.users_id','=','users.id')
                    ->where('users.email','=',$email)
                    ->get();
        if($data->isEmpty()){
            $dataDiri = DB::table('users')
                            ->select(DB::raw('users.*'))
                            ->where('users.email','=',$email)
                            ->get();
            return view('pages.dataprofile',compact('dataDiri'));
        }else{
            $dataDiri = DB::table('profiles')
                    ->select(DB::raw('profiles.*'))
                    ->join('users','profiles.users_id','=','users.id')
                    ->where('users.email','=',$email)
                    ->get();
            return view('pages.profil',compact('dataDiri'));
            
        }
        
        
    }
    public function addProfile(Request $Request){
        profile::insert([
            'users_id'  => $Request->id,
            'nama'      => $Request->nama,
            'alamat'    => $Request->alamat,
            'no_ktp'    => $Request->no_ktp,
            'no_hp'     => $Request->no_hp,
            'jk'        => $Request->jk,
            'tgl_lahir' => $Request->tgl_lahir
        ]);
        return redirect('/profile')->with('success-message','Berhasil update profile');
    }
    public function updateProfile(Request $request){
        profile::where('users_id',$request->id)->update([
            'users_id'  => $request->id,
            'nama'      => $request->nama,
            'alamat'    => $request->alamat,
            'no_ktp'    => $request->no_ktp,
            'no_hp'     => $request->no_hp,
            'jk'        => $request->jk,
            'tgl_lahir' => $request->tgl_lahir
        ]);
        return redirect('/profile')->with('success-message','Berhasil update profile');

    }
}
