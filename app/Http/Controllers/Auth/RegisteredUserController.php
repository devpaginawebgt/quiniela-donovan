<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Codigo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    public function createDoctor()
    {
        return view('auth.register-doctor');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $codigo = Codigo::where('codigo', $request->codigo)->where('estado', 0)->first();

        if(isset($codigo->id)){
            $request->validate([
                'nombres' => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                'numero_documento' => 'required|string|max:14',
                'telefono' => 'required|string|max:20',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
    
            $user = User::create([
                'name' => now(),
                'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'numero_documento' => $request->numero_documento,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'codigo_id' => $codigo->id,
                'pais_id'   => $request->pais_id,
                'password' => Hash::make($request->password),
            ]);
    
            event(new Registered($user));
    
            Auth::login($user);
    
            $codigo->estado = 1;
            $codigo->save();

            return redirect(RouteServiceProvider::HOME);
        }
        else{
            return view('auth.register',['message_error' => 'El codigo ingresado no es valido o ya fue utilizado, solicite un nuevo codigo e intentelo nuevamente.']);
        }
    }
}