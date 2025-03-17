<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\accounts;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(){
    	return view('login');
    }
    public function register(){
    	return view('register');
    }


  public function upload(Request $request)
{
    $request->validate([
        'fname' => 'required',
        'lname' => 'required',
        'Pos' => 'required', // ✅ Ensure "Pos" is validated
        'LicNo' => 'required|numeric',
        'email' => 'required|email|unique:accounts,email',
        'pword' => 'required|min:6',
    ]);

    try {
        $account = new accounts; // ✅ Corrected model name
        $account->fname = $request->fname;
        $account->lname = $request->lname;
        $account->Pos = $request->Pos; // ✅ Save "Pos"
        $account->LicNo = $request->LicNo;
        $account->email = $request->email;
        $account->pword = Hash::make($request->pword);
        $account->save();

        return redirect('/')->with('success', 'Registration successful!');
    } catch (\Exception $e) {
        return back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}




public function home()
{
    $user = session('user'); // Or Auth::user() if you're using Laravel's Auth system
    
    if (!$user) {
        return redirect()->route('login');
    }

    return view('home', compact('user'));
}



}
