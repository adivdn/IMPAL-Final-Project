<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pemesanan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'jumlah_tiket'  =>  'required',
            'tgl_pesan'     =>  'required',
            'jk'            =>  'required',
            'no_bangku'     =>  'required'
        ]);

        pemesanan::insert([
            'id_tiket'      => $request->id_tiket,
            'id_pembeli'    => $request->id_pembeli,
            'harga_pesanan' => $request->harga_pesanan,
            'jumlah_tiket'  => $request->jumlah_tiket,
            'tgl_pesan'     => $request->tgl_pesan,
            'jk'            => $request->jk,
            'no_bangku'     => $request->no_bangku,
            'countDiskon'   => $request->countDiskon + 1
        ]);
    }

    public function setCountDiskon(){
        $jumlah = pembeli::where('id',Auth::id())->select('countDiskon')->get();
        if($jumlah > 10){
            
        }
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
