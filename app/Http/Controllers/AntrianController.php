<?php

namespace App\Http\Controllers;

use App\StatusAntrian;
use Illuminate\Http\Request;
use \App\Antrian;
use Illuminate\Support\Facades\DB;

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$antrian = Antrian::all();
//        return view('/home');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function ambil_antrian(Request $request)
    {
        $data = Antrian::create([
            'tgl_periksa' => date('Y-m-d H:i:s'),
            'status_cek'  => 0,
            'id_pasien'   => $request-> id_pasien,
            'id_poli'     => $request-> id_poli,
        ]);
        if (sizeof($data)){
            return response()->json([
                'status' => 'OK',
                'data'   => [
                    'antrian' => $data -> id_antrian
                ]
            ]);
        }else{
            return response()->json([
                'status' => 'ERROR',
                'data'   => "ANTRIAN TUTUP"
            ]);
        }
    }*/
    public function bukaAntrian(){
        DB::table('antrian')->truncate();
//        $data = Antrian::all()->first();
        $data = StatusAntrian::all()->first();

        if(sizeof($data)==0){
            DB::table('status_antrian')->insert([
                'status_cek'=>self::KLINIK_BUKA
            ]);
        }else{
            DB::table('status_antrian')->update([
                'status_cek'=>self::KLINIK_BUKA
            ]);
        }
        return redirect()->back();
    }

    public function tutupAntrian(){
        /* DB::table('antrian')->truncate();
           $data = Antrian::all()->first();
           if(sizeof($data)==0){
             DB::table('status_antrian')->create([
                 'status_cek'=>self::KLINIK_TUTUP
             ]);
           }else{*/
        DB::table('status_antrian')->update([
            'status_cek'=>self::KLINIK_TUTUP
        ]);
        // }
        return redirect()->back();
    }

    public function create()
    {
        //Antrian::all()->
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
    public function update(Request $request)
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