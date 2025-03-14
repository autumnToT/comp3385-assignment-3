<!--create new client-->
@extends('layouts.app')

@section('content')
	<div class="container mt-5">
		<h1 class="mb-4">Create Client</h1>
		<form method="post" action="{{ route('store') }}" enctype="multipart/form-data" class="border p-4 rounded shadow">
			@csrf
			<div class="mb-3">
				<label for="name">Name:</label>
				<input type="text" name="name" id="name" class="form-control" required>
			</div>
			<div class="mb-3">
				<label for="email">Email:</label>
				<input type="email" name="email" id="email" class="form-control" required>
			</div>
			<div class="mb-3">
				<label for="telephone">Telephone:</label>
				<input type="text" name="telephone" id="telephone" class="form-control" required>
			</div>
			<div class="mb-3">
				<label for="address">Address:</label>
				<textarea name="address" id="address" class="form-control" required></textarea>
			</div>
			<div class="mb-3">
				<label for="company_logo">Company Logo:</label>
				<input type="file" name="company_logo" id="company_logo" class="form-control">
				<small>Only image files (e.g., jpg, png) are allowed, and files must be less than 2MB.
				</small>
			</div>
			<div>
				<button type="Submit" class="btn btn-primary">Create</button>
			</div>
		</form>
		@if($errors->any())
			<div class="alert alert-danger mt-3">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
		@endif
	</div>
@endsection