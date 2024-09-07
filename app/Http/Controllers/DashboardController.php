<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->session()->get('user');

        $user = User::where('id', $user->id)->first();

        return view('welcome', compact('user'));
    }
}
