<?php

namespace App\Http\Controllers;

use App\Antrian;
use App\Dokter;
use App\Pasien;
use App\RekamMedis;
use Illuminate\Http\Request;

class RMController extends Controller
{
    public function indexPegawai($antrian)
    {
        $antrian = Antrian::all()->where('id_antrian','=',$antrian)->first();
        return view('pegawai.index_rm',compact('rm'))
            ->with('pasien',$antrian->pasien)
            ->with('antrian',$antrian)
            ->with('poli',$antrian->poli)
            ->with('dokter',$antrian->poli->dokter);
    }

    public function indexDokter()
    {
        $rm = RekamMedis::with('poli', 'jadwal', 'dokter', 'pasien')->get();
        return view('dokter.index_rm',compact('rm'));
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
        RekamMedis::create([
            'tgl_periksa' => $request -> tgl_periksa,
            'keluhan'     => $request -> keluhan,
            'diagnosa'    => $request -> diagnosa,
            'terapi'      => $request -> terapi,
            'status_cek'  => $request -> status_cek,
            'id_dokter'   => $request -> id_dokter,
            'id_pasien'   => $request -> id_pasien
        ]);
        return back();
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
        //dd($request->all());
        $rm = RekamMedis::findOrFail($request->rm_id);

        $rm->update($request->all());
        return back();
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
