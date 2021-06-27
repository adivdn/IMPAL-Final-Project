<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pembayaran;
use App\Models\detail_pembayaran;

use Illuminate\Support\Facades\DB;

class payment extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
   
    public function success(){
        return view('pages.success');
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
        pembayaran::insert([
            'detail_pemesanans_id'  => $request->id,
            'metode'                => $request->metode,
            'total_harga'           => $request->total_harga
        ]);
        $dataBayar = DB::table('pembayarans')
                         ->select(DB::raw('pembayarans.id,pembayarans.total_harga'))
                         ->where('detail_pemesanans_id','=',$request->id)
                         ->limit(1)
                         ->get();
        return view('pages.nextpayment',compact('dataBayar'));
    }

    public function finalisasi(Request $request){
        detail_pembayaran::insert([
            'pembayarans_id'       => $request->id,
            'kode'                 => $request->kode,
            'konfirmasi'           => '0'
        ]);

        return redirect('/done');

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
