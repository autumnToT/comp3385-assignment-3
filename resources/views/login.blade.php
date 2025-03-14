<!--login form-->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
	<h1 class="mb-4">Login</h1>
	<form method="post" action="{{route('login')}}" class="border p-4 rounded shadow">
		@csrf
		<div class="mb-3">
			<label for="email" class="form-label">Email:</label>
			<input type="email" name="email" id="email" class="form-control" required>
		</div>
		<div class="mb-3">
			<label for="password" class="form-label">Password:</label>
			<input type="password" name="password" id="password" class="form-control" required>
		</div>
		<div>
			<button type="submit" class="btn btn-primary">Login</button>
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