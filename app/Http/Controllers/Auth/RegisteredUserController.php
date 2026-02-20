<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Codigo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterDoctorRequest;
use App\Http\Requests\Auth\RegisterRequest;
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
    public function store(RegisterRequest $request)
    {
        $data = $request->validated();

        $data['user_type_id'] = 1;

        $pass = env('DEFAULT_PASS');
        
        $data['password'] = Hash::make($pass);

        $user = User::create($data);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
        
    }

    public function storeDoctor(RegisterDoctorRequest $request)
    {
        $data = $request->validated();

        $data['user_type_id'] = 2;

        $pass = env('DEFAULT_PASS');
        
        $data['password'] = Hash::make($pass);

        $user = User::create($data);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
        
    }
}