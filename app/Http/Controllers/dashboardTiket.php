<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\tiket;
use App\Models\departure;
use App\Models\balik;
use App\Models\user;
class dashboardTiket extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pages.tiket');
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
    public function search(Request $request)
    {
        $stasiun_awal = $request->stasiun_awal;
        $stasiun_tujuan = $request->stasiun_tujuan;
        $jadwal = $request->jadwal;
        $jadwal_balik = $request->jadwal_balik;
        $jumlah_kursi = $request->jumlah_kursi;
        $jumlah_kursi2 = $request->jumlah_kursi2;

        $total = $jumlah_kursi + $jumlah_kursi2;
        $id = session('users_id');
        
        balik::insert([
            'users_id'          => $id,
            'stasiun_asal'      => $stasiun_awal,
            'stasiun_tujuan'    => $stasiun_tujuan,
            'jadwal'            => $jadwal,
            'adult'             => $jumlah_kursi,
            'child'             => $jumlah_kursi2
        ]);
        
        if($jadwal_balik == NULL){
          $listTiket = DB::table('tikets')
                            ->select(DB::raw('tikets.*,keretas.nama_kereta,keretas.jumlah_kursi,keretas.stasiun_asal,
                            keretas.stasiun_tujuan,keretas.jam_keberangkatan,keretas.jam_tiba'))
                            ->join('keretas','tikets.keretas_id','=','keretas.id')
                            ->where('tikets.jadwal','=',$jadwal)
                            ->where('keretas.stasiun_asal','=',$stasiun_awal)
                            ->where('keretas.stasiun_tujuan','=',$stasiun_tujuan)
                            ->get();
            
            return view('pages.tiket',compact('listTiket'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addCartDeparture(Request $request)
    {
        departure::insert([
            'tikets_id' => $request->id
        ]);
        $prosesTiket = DB::table('departures')
                        ->select(DB::raw('departures.id,tikets.jadwal,tikets.kelas,tikets.harga_tiket,keretas.nama_kereta,keretas.jumlah_kursi,keretas.stasiun_asal,
                        keretas.stasiun_tujuan,keretas.jam_keberangkatan,keretas.jam_tiba'))
                        ->join('tikets','departures.tikets_id','=','tikets.id')
                        ->join('keretas','tikets.keretas_id','=','keretas.id')
                        ->where('departures.tikets_id','=',$request->id)
                        ->limit(1)
                        ->get();

        return view('pages.proses',compact('prosesTiket'));
        
      
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
