<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create(){
        return view('auth.admin.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $login = Auth::guard('admin')
            ->attempt($request->only('email','password'));
        if (!$login){
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }
//        RateLimiter::clear($this->throttleKey());
        $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
