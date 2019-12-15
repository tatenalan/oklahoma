<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
}
