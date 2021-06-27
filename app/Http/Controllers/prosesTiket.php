<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tiket;
use App\Models\balik;
use App\Models\kereta;
use App\Models\pemesanan;
use App\Models\detail_pemesanan;

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
    public function prosesData(Request $request)
    {
        detail_pemesanan::insert([
            'pemesanans_id'     => $request->id,
            'total_cost'        => $request->total_cost,
            'title'             => $request->title,
            'name'              => $request->name,
            'type'              => $request->type,
            'id_number'         => $request->id_number,
            'number'            => $request->number,
            'seat'              => $request->seat,
        ]);

        $dataPesan = DB::table('detail_pemesanans')
                        ->select(DB::raw('detail_pemesanans.id,detail_pemesanans.total_cost'))
                        ->where('pemesanans_id','=',$request->id)
                        ->limit(1)
                        ->get();

        return view('pages.payment',compact('dataPesan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = session('users_id');
        $data = balik::where('users_id',$id)->first();
        $adult = $data->adult;
        $child = $data->child;
        
       pemesanan::insert([
           'users_id'           => $id, 
           'departures_id'       => $request->id,
           'nama_kereta'        => $request->nama_kereta,
           'kelas'              => $request->kelas,
           'stasiun_asal'       => $request->stasiun_asal,
           'stasiun_tujuan'     => $request->stasiun_tujuan,
           'jam_keberangkatan'  => $request->jam_keberangkatan,
           'harga'              => $request->harga,
           'adult'              => $adult,
           'child'              => $child
       ]);
       $listData = DB::table('pemesanans')
                    -> select(DB::raw('pemesanans.*'))
                    ->where('pemesanans.departures_id','=',$request->id)
                    ->limit(1)
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
