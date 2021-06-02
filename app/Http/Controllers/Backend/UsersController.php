<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('backend.contents.users.users-list',compact('users'));
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
                return redirect()-> route('dashboard');
            }
            elseif(auth()->user()->role == 'superAdmin') {
                return redirect()-> route('dashboard');
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
