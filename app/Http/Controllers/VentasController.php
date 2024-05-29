<?php

namespace App\Http\Controllers;
use App\Models\Criptomoneda;
use App\Models\Venta;
use App\Models\Compra;
use App\Models\User;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener las criptomonedas que el usuario ha comprado
        $userId = auth()->user()->id;
        $compras = Compra::where('id_cliente', $userId)->get();

        // Filtrar las criptomonedas únicas que el usuario ha comprado
        $criptomonedas = Criptomoneda::whereIn('id_criptomoneda', $compras->pluck('id_criptomoneda'))->get();

        return view('ventas.index', compact('criptomonedas'));
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
            'cantidad_de_venta' => 'required|integer|min:1',
        ]);

        $userId = auth()->user()->id;
        $user = User::find($userId); // Obtener el usuario actual
        $criptomoneda = Criptomoneda::find($request->id_criptomoneda);
        $cantidadTotalComprada = Compra::where('id_cliente', $userId)
            ->where('id_criptomoneda', $request->id_criptomoneda)
            ->sum('cantidad_de_compra');

        // Validar que la cantidad a vender no exceda la cantidad comprada
        if ($request->cantidad_de_venta > $cantidadTotalComprada) {
            return back()->withErrors(['cantidad_de_venta' => 'No tienes suficientes criptomonedas para vender.']);
        }

        $precioActual = $criptomoneda->precio_actual;
        $total = $request->cantidad_de_venta * $precioActual;

        // Guardar la venta en la base de datos
        Venta::create([
            'id_cliente' => $userId,
            'id_criptomoneda' => $request->id_criptomoneda,
            'fecha_venta' => now(),
            'cantidad_de_venta' => $request->cantidad_de_venta,
            'total' => $total,
        ]);

        // Sumar la ganancia al capital del usuario
        $user->capital += $total;
        $user->save();

        return redirect()->route('ventas.index')->with('success', 'Venta realizada con éxito.');
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
