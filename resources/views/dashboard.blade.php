@extends('layouts.app')

@section('content')
	<div class="container mt-5">
		<h1 class="display-5 fw-bold text-body-emphasis">Dashboard</h1>
		<p class="lead">Welcome to your dashboard. Here you can manage your account, your clients and much more.</p>
		<a href="{{ route('add') }}" class="btn btn-primary mb-4">+ Create Client</a>
		<h2 class="mb-3">Clients</h2>
		@if($clients->count()>0)
			<div class="row">
				@foreach($clients as $client)
					<div class="col-md-4 mb-4">
						<div class="card text-center">
							@if($client->company_logo)
								<img src="{{ asset('storage/' .$client->company_logo) }}" class="card-img-top" alt="Company Logo" style="height: 200px; object-fit: cover;">
							@endif
							<div class="card-body">
								<h5 class="card-title text-primary">{{$client->name}}</h5>
								<p class="card-text">
									<small class="text-muted">{{$client->email}}</small><br>
									<small class="text-muted">{{$client->telephone}}</small><br>
									<small class="text-muted">{{$client->address}}</small>
								</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		@else
			<p class="mt-3">No clients found.</p>
		@endif
	</div>
@endsection
