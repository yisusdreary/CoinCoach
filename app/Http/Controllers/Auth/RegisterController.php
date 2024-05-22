<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //dd($data);

        $messages = [
            'capital.min' => 'El minimo es 1 peso.',
            'capital.max' => 'El maximo es 1 millón.',
            'fecha_nac.before' => 'La fecha debe ser anterior a la actual.',
        ];

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'capital' => 'required|numeric|min:1|max:1000000',
            'fecha_nac' => 'required|date|before:today',
            'fecha_reg' => 'required|date',
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        //Consulta para obtener la cantidad de usuarios en la tabla users, sin importar si ya fueron eliminados.
        $data['num_reg'] = User::withTrashed()->count();
        $data['num_reg']++;
        //dd($data);

        return User::create([
            'name' => $data['name'],
            'capital' => $data['capital'],
            'fecha_nac'=> $data['fecha_nac'],
            'fecha_reg' => $data['fecha_reg'],
            'no_identificacion' => $data['num_reg'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
