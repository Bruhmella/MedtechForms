<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = Account::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->pword)) {
            session(['user' => $user]); // Store user in session
            return redirect()->route('home');
        } else {
            return redirect()->route('loginerror')->with('error', 'Invalid email or password.');
        }
    }
}
