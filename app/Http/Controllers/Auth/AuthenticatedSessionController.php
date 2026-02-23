<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Events\Lockout;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $pass = env('DEFAULT_PASS');

        return view('auth.login', [ 'pass' => $pass ]);
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $this->authenticate($request);

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    
    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(LoginRequest $request)
    {
        $this->ensureIsNotRateLimited($request);

        $data = $request->validated();

        $user = User::where('numero_documento', $data['numero_documento'])->first();

        if (empty($user)) {
            RateLimiter::hit($this->throttleKey($request));

            throw ValidationException::withMessages([
                'email' => 'El número de documento ingresado no está registrado en el sistema.',
            ]);
        }

        $credentials = ['email' => $user->email, 'password' => env('DEFAULT_PASS')];

        if (! Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => 'Ha ocurrido un error al iniciar la sesión, contacta a Soporte',
            ]);
        }

        RateLimiter::clear($this->throttleKey($request));
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(LoginRequest $request)
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey($request), 10)) {
            return;
        }

        event(new Lockout($request));

        $seconds = RateLimiter::availableIn($this->throttleKey($request));

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey($request)
    {
        return Str::lower($request->input('numero_documento')).'|'.$request->ip();
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
