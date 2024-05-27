<?php

namespace App\Http\Controllers;

use App\Models\Criptomoneda;
use Illuminate\Http\Request;

class CriptomonedaAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $criptomonedas = Criptomoneda::all();
        return view('criptomonedasAdmin.index', compact("criptomonedas"));
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
        //
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
    public function edit(Criptomoneda $criptomoneda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Criptomoneda $criptomoneda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Criptomoneda $criptomoneda)
    {
        //
    }
}
