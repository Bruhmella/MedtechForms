<?php

namespace App\Http\Controllers; // 👈 This is required!

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Account;
use Illuminate\Routing\Controller;
use App\Models\BasicPatData;


class HomeController extends Controller
{
    public function home()
    {
        // Get logged-in user from session
        $user = session('user');

        if ($user) {
            return view('home', ['user' => $user]);
        } else {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }
    }

    public function AddPatData()
    {
        return view ('AddPatData');
    }

public function Urinalysis()
{
    // Check if user is logged in
    $user = session('user');

    if (!$user) {
        return redirect()->route('login')->with('error', 'Please log in first.');
    }

    // ✅ Pass the user session to the view
    return view('Urinalysis', ['user' => $user]);
}

	public function AddDr(){
		return view ('AddDr');
	}

	public function UptPatData(){
		return view ('UptPatData');
	}
	public function DelPatData(){
		return view ('DelPatData');
	}
    public function PatDataManage(){
    $patients = BasicPatData::all(); // Fetch all patient data
    return view('PatDataManage', compact('patients'));
    }
    
    public function Parchives(){
        return view('Parchives');
    }
}
