<?php

namespace App\Http\Controllers;

use App\Antrian;
use App\Dokter;
use App\Pasien;
use App\RekamMedis;
use App\ResepObat;
use App\StandarCekLab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RMController extends Controller
{
    public function indexPegawai($antrian)
    {
        $antrian = Antrian::all()->where('id_antrian','=',$antrian)->first();
        return view('pegawai.index_rm',compact('rm'))
            ->with('pasien',$antrian->pasien)
            ->with('antrian',$antrian)
            ->with('poli',$antrian->poli)
            ->with('jenis_pemeriksaan', StandarCekLab::all())
            ->with('dokter',$antrian->poli->dokter)
            ->with('obat', $this->getDataObat())
            ->with('viewobat', $this->getViewDataObat());
    }

    public function indexDokter($antrian)
    {
        $antrian = Antrian::all()->where('id_antrian','=',$antrian)->first();
        return view('dokter.index_rm',compact('rm'))
            ->with('pasien',$antrian->pasien)
            ->with('antrian',$antrian)
            ->with('poli',$antrian->poli)
            ->with('dokter',$antrian->poli->dokter);
    }

    public function hasilRm($antrian){
        $hasilrm = Antrian::all()->where('id_antrian','=',$antrian)->first();

        //$hasilrm->update($request->all());
        //$antrian = Antrian::all()->where('id_antrian','=',$antrian)->first();
        return view('pegawai.index_hasilrm',compact('hasilrm'))
            ->with('pasien',$antrian->pasien)
            ->with('antrian',$antrian)
            ->with('poli',$antrian->poli)
            ->with('jenis_pemeriksaan', StandarCekLab::all())
            ->with('dokter',$antrian->poli->dokter);
    }

    public function getDataObat(){
        $data_obat = DB::table('obat')
        ->get();

        return $data_obat;
    }

    public function getViewDataObat(){
        $data_obat = DB::table('obat')
            ->join('resep_obat', 'resep_obat.id_obat', 'obat.id_obat')
            ->get();

        return $data_obat;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //dd($request->all());
        RekamMedis::create($request->all());
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        RekamMedis::create([
            'keluhan'     => $request-> keluhan,
            'diagnosa'    => $request-> diagnosa,
            'id_dokter'   => $request-> id_dokter,
            'id_pasien'   => $request-> id_pasien
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
    { //dd($request->all());
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
