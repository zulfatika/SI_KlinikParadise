<?php

namespace App\Http\Controllers;

use App\Antrian;
use App\Poli;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    const KLINIK_BUKA = 1;
    const KLINIK_TUTUP = 0;

    /**
     * Create a new controller instance.
     *
     * @return void
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
        $polis = Poli::with('antrian')->get();
        return view('/home',compact('antrian'))
            ->with('status_antrian',$this->statusAntrian())
            ->with('polis',$polis);

    }

    public function statusAntrian()
    {
        $data = DB::table('status_antrian')->first();
        if (sizeof($data) == 0) {
            return self::KLINIK_TUTUP;
        }
        return $data->status_cek;
    }

}