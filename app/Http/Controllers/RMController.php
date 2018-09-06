<?php

namespace App\Http\Controllers;

use App\Antrian;
use App\RekamMedis;
use App\ResepObat;
use App\StatusAntarObat;
use App\StandarCekLab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RMController extends Controller
{
    const ANTAR_OBAT = 0;
    const PROSES_ANTAR = 1;
    const SELESAI_ANTAR = 2;

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

    public function getViewHasil(){
        $pasien = DB::table('pasien as p')
            ->select(['p.*','s.status_obat'])
            ->leftJoin('status_kirim_obat as s','s.id_pasien','p.id_pasien')
            ->get();

        return view('pegawai/hasil_allrm')
            ->with('pasien',$pasien);
    }

    public function getViewHasilRm($id_pasien){
        $hasilrm = DB::table('rm_pemeriksaan as rm')
            ->select('*', 'rm.created_at as tgl')
            ->join('pasien as p','rm.id_pasien','p.id_pasien')
            ->where('p.id_pasien',$id_pasien)
            ->get();

        $hasilfisik = DB::table('cekfisik as cf')
            ->select('*', 'cf.created_at as tgl')
            ->join('pasien as p','cf.id_pasien','p.id_pasien')
            ->where('p.id_pasien',$id_pasien)
            ->get();

        $hasillab = DB::table('pemeriksaanlab as pl')
            ->select('*', 'pl.created_at as tgl')
            ->join('pasien as p','p.id_pasien','pl.id_pasien')
            ->join('jenispemeriksaanlab as jl','jl.id_jeniskadar','pl.id_jeniskadar')
            ->where('p.id_pasien',$id_pasien)
            ->get();
            // dd($hasillab);
        $hasilterapi = RekamMedis::all()->where('id_pasien','=',$id_pasien);
        $resep_obat = array();
        foreach ($hasilterapi as $val){
            $obat = ResepObat::all()->where('id_rm','=',$val->id_rm);
            foreach ($obat as $o){
                array_push($resep_obat, [
                    "id_resep_obat" => $o->id_resep_obat,
                    "jml_obat" => $o->jml_obat,
                    "aturan_pakai" => $o->aturan_pakai,
                    "keterangan" => $o->keterangan,
                    "obat" => $o->obat,
                    "id_rm" => $o->id_rm,
                    "time" => $o->created_at,
                    "updated_at" => $o->updated_at,
                ]);
            }
        }
//        dd($resep_obat);

        return view('pegawai/index_hasilrm')
            ->with('hasilrm',$hasilrm)
            ->with('hasilfisik',$hasilfisik)
            ->with('hasillab',$hasillab)
            ->with('hasilterapi',json_decode(json_encode($resep_obat)));
    }

    public function getDataObat(){
        $data_obat = DB::table('obat')
        ->get();

        return $data_obat;
    }

    public function getViewDataObat(){
        $data_obat = DB::table('obat')
            ->join('resep_obat', 'resep_obat.id_obat', 'obat.id_obat')
            ->join('rm_pemeriksaan', 'rm_pemeriksaan.id_rm','resep_obat.id_rm')
            ->join('antrian', 'antrian.id_pasien', 'rm_pemeriksaan.id_pasien')
//            ->where('antrian.id_antrian', $id_antrian)
            ->get();

//        dd($data_obat);

        return $data_obat;
    }

       public function statusAntarObat($id)
       {
            $status = new StatusAntarObat;
            $status->status_obat = 1;
            $status->id_pasien = $id;
            $status->save();

            return redirect()->back();
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
