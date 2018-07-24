<?php

namespace App\Http\Controllers;

use App\HasilCekLab;
use App\StandarCekLab;
use Illuminate\Http\Request;

class PemeriksaanLabController extends Controller
{
    public function index()
    {
        $standarcek = StandarCekLab::all();
        //dd($standarcek);
        return view('pegawai.index_rm',compact('standarcek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
//        dd($request->all());
        foreach ($request->jenis as $val)
            HasilCekLab::create([
                'hasil_kadar'=>$val['hasil'],
                'keterangan'=>$val['ket'],
                'id_jeniskadar'=>$val['jenis'],
                'id_pasien'=>$request->id_pasien
            ]);
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
        StandarCekLab::create($request->all());

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
        DB::table('jenispemeriksaanlab')
            ->select('*')
            ->where('id_jeniskadar', $request->id_jeniskadar)
            ->update(['nama_kadar' => $request -> nama_kadar,
                'standart_kadar' => $request -> standart_kadar,
                'satuan_kadar' => $request -> satuan_kadar]);
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
        DB::table('jenispemeriksaanlab')->where('id_jeniskadar', '=', $request->id_jeniskadar)->delete();

        return back();
    }
}
