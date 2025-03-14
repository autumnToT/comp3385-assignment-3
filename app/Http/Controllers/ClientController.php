<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    //
	public function create(){
		return view('create');
	}
	//check lectures
	public function store(Request $request){
		$credentials = $request->validate([
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'email', 'unique:clients', 'email'],
			'telephone' => ['required', 'string', 'max:20'],
			'address' => ['required', 'string'],
			'company_logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
		]);
		
		if($request->hasFile('company_logo')){
			$credentials['company_logo'] = $request->file('company_logo')->store('company_logos', 'public');
		}
		
		Client::create($credentials);
		
		return redirect()->route('dashboard')->with('Success!', 'Client created successfully!');
	}
}
