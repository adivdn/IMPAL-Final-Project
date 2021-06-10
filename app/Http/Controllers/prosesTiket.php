<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tiket;
use App\Models\balik;
use App\Models\kereta;


class prosesTiket extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = DB::table('baliks')
                        -> select(DB::raw('baliks.adult,baliks.child'))
                        ->where('baliks.jadwal','=',$request->jadwal)
                        ->where('baliks.stasiun_asal','=',$request->stasiun_awal)
                        ->where('baliks.stasiun_tujuan','=',$request->stasiun_tujuan)
                        ->get();
       pemesanan::insert([
           'deparures_id'       => $request->id,
           'nama_kereta'        => $request->nama_kereta,
           'kelas'              => $request->kelas,
           'stasiun_asal'       => $request->stasiun_asal,
           'stasiun_tujuan'     => $request->stasiun_tujuan,
           'jam_keberangkatan'  => $request->jam_keberangkatan,
           'harga'              => $request->harga,
           'adult'              => $data->adult,
           'child'              => $data->child
       ]);
       $listData = DB::table('pemesanans')
                    -> select(DB::raw('pemesanans.*'))
                    ->where('pemesanans.jadwal','=',$request->jadwal)
                    ->where('pemesanans.nama_kereta','=',$request->nama_kereta)
                    ->where('pemesanans.stasiun_asal','=',$request->stasiun_awal)
                    ->where('pemesanans.stasiun_tujuan','=',$request->stasiun_tujuan)
                    ->get();
       return view('pages.booking',compact('listData'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
