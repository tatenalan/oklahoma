<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
      return Validator::make($data, [
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'birth_date' => ['required', 'date'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:6', 'confirmed'],
        'avatar' => 'image|mimes:jpg,jpeg,png|max:2048',
        'home_address' => ['string', 'max:255'],
        'terms' => ['required'],
      ],
      [
        "required" => "El campo :attribute no puede estar vacio",
        "password.confirmed" => "Las contraseñas no coinciden",
        'string' => "El campo :attribute debe ser un texto",
        "date" => "El campo debe ser una fecha",
        "password.between" => "Tu contraseña debe tener como mínimo 6 caracteres",
        "unique" => "El email que ingresaste ya esta en uso",
        "email" => "Por favor ingrese un email",
        "avatar"=> "Por favor ingrese una imagen",
        "min" => "El campo :attribute tiene un minimo de :min caracteres",
        "max" => "El campo :attribute tiene un maximo de :max caracteres",
        "image" => "Por favor suba una imagen",
        "avatar.mimes" => 'Formato de imagen invalido',
        "terms.required" => 'Debes aceptar los terminos y condiciones',
        "avatar.max" => 'La imagen es muy pesada'
      ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

      // Instancio un carrito
      $cart = new Cart;
      $cart->quantity = 0;

      $cart->save();
      $path = null;
      if (isset($data['avatar'])) {
        $file = $data['avatar']->store('public');
        $path = basename($file);
      }

        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'birthDate' => $data['birth_date'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar' => $path,
            'address' => $data['home_address'],
            'cart_id' => $cart->id,
            'isAdmin' => 0,
        ]);
    }
}
