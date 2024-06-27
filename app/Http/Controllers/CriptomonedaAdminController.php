<?php

namespace App\Http\Controllers;

use App\Models\Criptomoneda;
use App\Models\User;
use Illuminate\Http\Request;

class CriptomonedaAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $criptomonedas = Criptomoneda::all();
        return view('criptomonedasAdmin.index', compact('criptomonedas'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('criptomonedasAdmin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Criptomoneda::create([
        "nombre_c"=>$request->nombre_c,
        "precio_actual"=>$request->precio_actual,
        "precio_anterior"=>0
    ]);
        return redirect()->route("criptomonedasAdmin.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Criptomoneda $criptomoneda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($llegan)
    {
        $criptomoneda = Criptomoneda::where('id_criptomoneda',$llegan)->first();
        //dd($criptomoneda);
        return view('criptomonedasAdmin.edit', compact('criptomoneda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $criptomoneda = Criptomoneda::where('id_criptomoneda',$request->id)->first();
        //dd($criptomoneda,$request->all());
        $criptomoneda->update([
            "nombre_c"=>$request->nombre_c,
            "precio_actual"=>$request->precio_actual,
            "precio_anterior"=>$criptomoneda->precio_actual
        ]);
        return redirect()->route("criptomonedasAdmin.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($criptomoneda)
    {
        //dd($criptomoneda->all());
        $dato = Criptomoneda::find($criptomoneda);
        $dato->delete();
        return redirect()->back();
    }
}
