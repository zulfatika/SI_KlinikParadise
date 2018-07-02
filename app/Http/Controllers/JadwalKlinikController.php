<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JadwalKlinik;
use Illuminate\Support\Facades\DB;

class JadwalKlinikController extends Controller
{

    public function index()
    {
        $jadwalklinik = JadwalKlinik::all();
        return view('admin.index_jadwal_klinik',compact('jadwalklinik'));
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
        JadwalKlinik::create($request->all());

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
        DB::table('jadwal_klinik')
            ->select('*')
            ->where('id_jadwalklinik', $request->id_jadwalklinik)
            ->update(['shift_klinik' => $request -> shift_klinik,'jam_buka' => $request -> jam_buka,
                'jam_tutup' => $request -> jam_tutup]);
        //$jadwal = Jadwal::findOrFail($request->jadwal_id);
        //$jadwal->update($request->all());
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
        DB::table('jadwal_klinik')->where('id_jadwalklinik', '=', $request->id_jadwalklinik)->delete();

        return back();
    }
}
