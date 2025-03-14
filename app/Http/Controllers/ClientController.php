<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
	public function create(){
		return view('create');
	}
	//check lectures
	public function store(Request $request){
		$request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|email|unique:clients,email',
			'telephone' => 'required|string|max:20',
			'address' => 'required|string',
			'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
		]);
		
		if($request->hasFile('company_logo')){
			$logoPath = $request->file('company_logo')->store('public/logos');
			$logoPath =str_replace('public/','storage/',$logoPath);
		}
		else{
			$logoPath = null;
		}
		Client:create([
			'name' => $request->name,
			'email' => $request->email,
			'telephone' => $request->telephone,
			'address' => $request->address,
			'company_logo' => $logoPath,
		]);
		
		return redirect()->route('dashboard')->with('Success!', 'Client created successfully!');
	}
}
