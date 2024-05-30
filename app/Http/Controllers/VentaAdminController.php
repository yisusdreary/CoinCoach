<?php

namespace App\Http\Controllers;

use App\Models\Criptomoneda;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentaAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Venta::all();
        return view('ventasAdmin.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $criptomonedas = Criptomoneda::all();
        $usuarios = User::all();
        return view('ventasAdmin.create', compact('criptomonedas', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Venta::create([
            'id_cliente' => $request->id,
            'id_criptomoneda' => $request->id_criptomoneda,
            'fecha_venta' => now(),
            'cantidad_de_venta' => $request->cantidad_de_compra,
            'total' =>$request->total
        ]);
        return redirect()->route("ventasAdmin.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        $criptomonedas = Criptomoneda::all();
        $usuarios = User::all();
        return view('ventasAdmin.edit', compact('criptomonedas', 'usuarios', 'venta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        $venta->update([
            'id_cliente' => $request->id,
            'id_criptomoneda' => $request->id_criptomoneda,
            'fecha_venta' => now(),
            'cantidad_de_venta' => $request->cantidad_de_compra,
            'total' =>$request->total
        ]);
        return redirect()->route("ventasAdmin.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($venta)
    {
        $dato = Venta::find($venta);
        $dato->delete();
        return redirect()->back();
    }
}
