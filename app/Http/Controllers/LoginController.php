<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $request->session()->put('user', $user);
            return redirect()->intended('/');
        } else {
            session()->flash('login_error', 'Username atau Password salah!');

            return back();
        }
    }
    
    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return redirect('/login');
    }
}
