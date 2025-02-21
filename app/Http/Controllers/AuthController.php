<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.auth.login', [
            "title" => "Login"
        ]);
    }


    public function login(Request $request)
    {
        $request->validate([
            'login' => 'string|required',
            'password' => 'string|required',
        ]);

        $fieldType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $credentials = [
            $fieldType => $request->login,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Login Berhasil.');
        }

        return redirect()->back()->with('error', 'Login Gagal, periksa kembali username/email dan password anda.');
    }

    public function showFormRegister()
    {
        return view('pages.auth.register', [
            "title" => "Register"
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns|unique:users',
            'name' => 'required|min:3|max:255|unique:users',
            'username' => 'required|min:3|max:255',
            'password' => ['required', 'confirmed', Rules\Password::default()],
        ]);

        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Register Berhasil, silakan login untuk melanjutkan.');
    }
}