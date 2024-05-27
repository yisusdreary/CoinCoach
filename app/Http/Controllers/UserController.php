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
        $usuarios = User::all();
        return view('users.index', compact('usuarios'));
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
            'capital.numeric' => 'El capital tiene que se numerico',
            'capital.min' => 'El minimo es 1 peso.',
            'capital.max' => 'El maximo es 1 millón.',
        ];

        $request->validate([
            'nombre' => 'required',
            'capital' => 'required|numeric|min:1|max:1000000',
        ], $messages);

        User::where('id',$user)->update([
            'name' => $request->nombre,
            'capital' => $request->capital
        ]);
        //dd($user, $request->all());

        //Toastr::success('Se actualizaron los datos correctamente','Exito');
        //La sesion viaja hacia la vista y despues en la vista con javaScript, se confirma que exista y se muestra el mensaje de la alerta.
        return redirect()->route('home.index')->with('success','Registro actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
