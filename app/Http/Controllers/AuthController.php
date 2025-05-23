<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //the two methods
	public function create(){
		//get the form for login
		return view('login');
	}
	public function store(Request $request){
		//get the user info to check if correct or not
		$credentials = $request->validate([
			'email' => ['required', 'email'],
			'password' => ['required'],
		]);
		if(Auth::attempt($credentials)){
			$request->session()->regenerate();
			
			return redirect()->route('dashboard');
		}
		
		return back()->withErrors([
			'email' => 'Invalid credentials. Check the email address and password entered.',])->onlyInput('email');
	}
	
	public function logout(Request $request){
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		
		return redirect('/')->with('Success!', 'You have been logged out.');
	}
}
