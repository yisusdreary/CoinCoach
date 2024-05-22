<?php

namespace App\Http\Controllers;

use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('criptomonedas.index');
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
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //dd($id);
        $user = User::find($id);
        //dd($user);
        return view('auth.user_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user)
    {
        $messages = [
            'nombre.required' => 'El nombre es requerido',
            'capital.required' => 'El capital es requerido',
            'capital.numeric' => 'El capital tiene que se numerico'
        ];

        $request->validate([
            'nombre' => 'required',
            'capital' => 'required|numeric',
        ], $messages);

        User::where('id',$user)->update([
            'name' => $request->nombre,
            'capital' => $request->capital
        ]);
        //dd($user, $request->all());

        Toastr::success('Se actualizaron los datos correctamente','Exito');
        return redirect()->route('home.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
