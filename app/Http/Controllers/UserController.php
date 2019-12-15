<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth; // Necesario para obtener los valores del Auth!!!!

class UserController extends Controller
{
  public function show() // se muestran los datos del usuario elegido
  {
    return view('/profile');
  }

  public function edit()  // se muestran los datos del usuario elegido para editar
  {
    return view('/edituser');
  }

  public function update(Request $request){ // se muestra el usuario con los campos completos listos para editar. A diferencia de guardar, update lleva tambien la variable $id

    // Declaro las variables de validacion

    $reglas = [
      'first_name' =>'required|string|min:2|max:40|',
      'last_name' =>'required|string|min:2|max:40|',
      'email' => ['required', 'string', 'email', 'max:255'], // le sacamos 'unique:users'
      'password' => ['required', 'string', 'min:6', 'confirmed'],
      'avatar' => 'image|mimes:jpg,jpeg,png',

    ];

    $mensajes = [
    "required" => "El campo es obligatorio",
    "string" => "El campo debe ser un texto",
    "min" => "El minimo es de :min caracteres",
    "max" => "El maximo es de :max caracteres",
    "date" => "El campo :date debe ser una fecha",
    "integer" => "El campo debe ser un numero entero",
    "numeric" => "El campo debe ser un numero",
    "image" => "Debe ser una imagen",
    "mimes" => "Debe ser una imagen",
    ];

    // Validamos
    $this->validate($request, $reglas);

    // busco el usuario
    $user = User::find(Auth::user()->id);
    dd($user);

    // Redirijo
    return redirect('/profile');

  }


}
