<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detail_pembayaran;
use Illuminate\Support\Facades\DB;

class adminPembayaran extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataBayar = detail_pembayaran::all();
        return view('pages.pembayaran',compact('dataBayar'));
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
    public function edit($id,$status)
    {
        if($status == 'sudah'){
            detail_pembayaran::where('id',$id)->update([
                'konfirmasi'    => 'sudah'
            ]);
            return redirect('admin/pembayaran');
        }else if($status == 'belum'){
            detail_pembayaran::where('id',$id)->update([
                'konfirmasi'    => 'belum'
            ]);
            return redirect('admin/pembayaran');

        }
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
