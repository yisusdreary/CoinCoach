<?php

namespace App\Http\Controllers;
use App\Models\Criptomoneda;
use App\Models\Compra;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

// Obtener todas las criptomonedas disponibles
        $criptomonedas = Criptomoneda::all();

        // Pasar los datos a la vista 'ventas.index'
        return view('compras.index', compact('criptomonedas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'id_criptomoneda' => 'required|exists:criptomonedas,id_criptomoneda',
            'cantidad_de_compra' => 'required|integer|min:1',
        ]);

        $user = Auth::user();
        $criptomoneda = Criptomoneda::find($request->id_criptomoneda);
        $precioActual = $criptomoneda->precio_actual;
        $total = $request->cantidad_de_compra * $precioActual;

        // Validar que el usuario tiene suficiente capital
        if ($total > $user->capital) {
            return back()->withErrors(['capital' => 'No tienes suficiente capital para realizar esta compra.']);
        }

        // Restar el total de la compra del capital del usuario
        $user->capital -= $total;
        $user->save();

        // Guardar la compra en la base de datos
        Compra::create([
            'id_cliente' => $user->id,
            'id_criptomoneda' => $request->id_criptomoneda,
            'fecha_compra' => now(),
            'cantidad_de_compra' => $request->cantidad_de_compra,
            'total' => $total,
        ]);

        return redirect()->route('compras.index')->with('success', 'Compra realizada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
