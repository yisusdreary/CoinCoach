<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Criptomoneda;
use App\Models\User;
use Illuminate\Http\Request;

class CompraAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $compras = Compra::all();
        return view('comprasAdmin.index', compact("compras"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $criptomonedas = Criptomoneda::all();
        $usuarios = User::all();
        return view('comprasAdmin.create', compact('criptomonedas', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Compra::create([
            'id_cliente' => $request->id,
            'id_criptomoneda' => $request->id_criptomoneda,
            'fecha_compra' => now(),
            'cantidad_de_compra' => $request->cantidad_de_compra,
            'total' =>$request->total
        ]);
        return redirect()->route("comprasAdmin.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compra $compra)
    {
        $criptomonedas = Criptomoneda::all();
        $usuarios = User::all();
        return view('comprasAdmin.edit', compact('criptomonedas', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($compra)
    {
        $dato = Compra::find($compra);
        $dato->delete();
        return redirect()->back();
    }
}
