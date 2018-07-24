<?php

namespace App\Http\Controllers;

use App\CekFisik;
use Illuminate\Http\Request;

class CekFisikController extends Controller
{

    function create(Request $request){
//        dd($request->all());
        CekFisik::create($request->all());
        return redirect()->back();
    }
    //
}
