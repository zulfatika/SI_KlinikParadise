<?php

namespace App\Http\Controllers;

use App\Obat;
use App\ResepObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::all();
        return view('admin.index_obat',compact('obat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        dd($request->all());
        foreach ($request->obat as $val)
            ResepObat::create([
                'jml_obat'=>$val['jml'],
                'aturan_pakai'=>$val['aturan'],
                'keterangan'=>$val['ket'],
                'id_obat'=>$val['obat'],
                'id_rm'=>$request->id_rm
            ]);
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function getIdRm(){
        $id_rm = DB::table('rm_pemeriksaan')->select('id_rm')->orderByDesc('id_rm')->first();

        return $id_rm;
    }

    public function store(Request $request)
    {
        $id_rm = $this->getIdRm();
        $id = $id_rm->id_rm;
        $resep = new ResepObat;
        $resep->jml_obat = $request->jml_obat;
        $resep->aturan_pakai = $request->aturan_pakai;
        $resep->keterangan = $request->keterangan;
        $resep->id_obat = $request->id_obat;
        $resep->id_rm = $id;

        $resep->save();

//        ResepObat::create($request->all());
//        Obat::create($request->all());

        return back();
    }

    public function storeObat(Request $request){
        $obat = new Obat;
        $obat->nama_obat = $request->nama_obat;
        $obat->satuan_obat = $request->satuan_obat;

        $obat->save();

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
        DB::table('obat')
            ->select('*')
            ->where('id_obat', $request->id_obat)
            ->update(['nama_obat' => $request -> nama_obat,'satuan_obat' => $request -> satuan_obat]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::table('obat')->where('id_obat', '=', $request->id_obat)->delete();

        return back();
    }
}
