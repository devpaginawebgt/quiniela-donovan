<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Codigo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterDoctorRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Services\CountryService;
use App\Http\Services\TermsService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
class RegisteredUserController extends Controller
{
    public function __construct(
        private readonly CountryService $countryService,
        private readonly TermsService $termsService
    ) {}

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $terms = $this->termsService->getTerms();

        $countries = $this->countryService->getCountries();

        return view('modulos.register', compact('countries', 'terms'));
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

        $data['puntos'] = 0;

        $pass = env('DEFAULT_PASS');
        
        $data['password'] = Hash::make($pass);

        $user = User::create($data);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
        
    }
}