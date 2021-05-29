<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function users()
    {
        return view('backend.contents.users.users-list');
    }
    public function addUser()
    {

        return view('backend.contents.users.adduser-list');
    }
    public function showLoginForm()
    {

        return view('backend.contents.login.login-list');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        // dd($request->all());
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->role == 'admin') {
                return redirect()-> route('home');
            }
            elseif(auth()->user()->role == 'superAdmin') {
                return redirect()-> route('home');
            }
        }
        return back()->withErrors([
            'email' => 'invalid credentials'
        ]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.list');
    }
}
