<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth; // Necesario para obtener los valores del Auth!!!!
use Illuminate\Support\Facades\Hash; // Necesario para hashear la password!!!!

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
      'password' => ['string', 'min:6'],
      'avatar' => 'image|mimes:jpg,jpeg,png'
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
    "mimes" => "Debe ser una imagen"
    ];

    // Validamos
    $this->validate($request, $reglas,$mensajes);

      // busco el usuario
      $user = User::find(Auth::user()->id);
      $user->first_name = $request['first_name']; // alternativa $movie->first_name = $request->first_name;
      $user->last_name = $request['last_name'];
      $user->email = $request['email'];
      $user->password = Hash::make($request->password);

      if ($request->file("avatar")) { // si cambian una foto         ALTERNATIVA: if ($request->file('poster'))
        // obtenemos la ruta de la foto anterior
        $image_path = storage_path('app/public/') . $user->avatar;
        // verificamos si existe en la base de datos y en storage
        if ($user->avatar && file_exists($image_path)) {
        // elimina la foto del storage
          unlink($image_path);
        }

      $ruta = $request->file("avatar")->store("public"); // Esta ruta guarda al archivo con la ruta entera.
      $nombreDelArchivo = basename($ruta); // basename recorta la ruta y nos deja solo el nombre del archivo.
      $user->avatar = $nombreDelArchivo; // le asigna la nueva ruta a la base de datos
      }

      //guardo en la base de datos
      $user->save();

      return redirect('/profile');


    $user->first_name = $request['first_name'];
    $user->last_name = $request['last_name'];
    $user->email = $request['email'];
    $user->save();
    return redirect('/profile');

  }

  public function delete() // borrar el usuario y deslinkear cualquier relacion, en este caso, borra su carrito
  {
    $user = User::find(Auth::user()->id);
    // traemos todas las imagenes relacionadas a ese producto utilizando la relacion del modelo
    $avatar = $user->avatar;

    $image_path = storage_path('app/public/') . $avatar;
    // verificamos si existe en la base de datos y en storage
    if ($user->avatar && file_exists($image_path)) {
      // deslinkeo las imagenes
      unlink($image_path);
    }

    $user->delete();
    return redirect("/");
  }


}
