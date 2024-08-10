<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(UserRegisterRequest $request)
    {
        $data = $request->validated();
        User::create($data);

        return redirect()->route('login')->with('success', 'Successfully registration');
    }

    public function login()
    {
        return view('user.login');
    }

    public function loginAuth(UserLoginRequest $request)
    {
        $credential = $request->validated();
        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->intended('sklad')->with('success', 'Welcome, '.Auth::user()->name.'!');
        }

        return back()->withErrors([
           'email' => 'Wrong email or password',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
