<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pemesanan;
use Illuminate\Support\Facades\DB;

class adminPemesanan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataPemesan = DB::table('detail_pemesanans')
                            ->select(DB::raw('detail_pemesanans.id,detail_pemesanans.total_cost,detail_pemesanans.nama,
                            pemesanans.nama_kereta,pemesanans.stasiun_asal,pemesanans.stasiun_tujuan,
                            pemesanans.jam_keberangkatan,pemesanans.adult,
                            pemesanans.child'))
                            ->join('pemesanans','detail_pemesanans.pemesanans_id','=','pemesanans.id')
                            ->get();
        return view('pages.adminPemesanan',compact('dataPemesan'));
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
        //
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
