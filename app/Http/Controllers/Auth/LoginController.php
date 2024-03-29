<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $this->validate($request, [
            "email" => "required|email",
            "password" => "required|min:4",
        ]);

        if (auth()->attempt([
            "email" => $email,
            "password" => $password,
        ])) {

            if (auth()->user()->role == "admin") {
                return redirect()->route('dashboard')->with('status', 'Kamu Berhasil login');
            } elseif (auth()->user()->role == "designer") {
                return redirect()->route('dashboard')->with('status', 'Kamu Berhasil login');
            } else {
                return redirect()->route('home')->with('status', 'Kamu berhasil login');
            }
        } else {
            return redirect()->route('login')->with('error', 'Email / Password kamu salah');
        }
    }
}
