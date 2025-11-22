<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        }

        else {
            return back()->withErrors(['email' => 'Hibás bejelentkezési adatok!',]);
        }
    }

    public function show()
    {
        return view('auth.login');
    }
}
