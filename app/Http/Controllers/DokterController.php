<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use \App\Dokter;
use Illuminate\Support\Facades\Hash;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokter = Dokter::with('poli', 'jadwal','users')->get();
        return view('admin.index_dokter',compact('dokter'));
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
        $user=User::create([
            'username'=>$request->username,
            'name'=>$request->name,
            'password'=>Hash::make($request->password)
        ]);

        Dokter::create([
            'id_user'=>$user->id,
            'sip_dokter'=>$request->sip_dokter,
            'alamat'=>$request->alamat,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'no_telp'=>$request->no_telp,
            'id_poli'=>$request->id_poli,
            'id_jadwal'=>$request->id_jadwal
        ]);
        $user->attachRole(Role::find(4));
        $user->save();
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
        $dokter = Dokter::findOrFail($request->dokter_id);

        $dokter->update($request->all());
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
