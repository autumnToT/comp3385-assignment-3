@extends('layouts.app')

@section('content')
	<div class="container mt-5">
		<h1 class="display-5 fw-bold text-body-emphasis">Dashboard</h1>
		<p class="lead">Welcome to your dashboard. Here you can manage your account, your clients and much more.</p>
		<a href="{{ route('add') }}" class="btn btn-primary mb-4">+ Create Client</a>
		<h2 class="mb-3">Clients</h2>
		@if($clients->count()>0)
			<div class="list-group">
				@foreach($clients as $client)
					<div class="list-group-item d-flex align-items-start">
						@if($client->company_logo)
							<img src="{{asset($client->company_logo)}}" alt="Company Logo" width="100" class="me-3">
						@endif
						<div>
							<strong>{{$client->name}}</strong><br>
							<small class="text-muted">{{$client->email}}</small><br>
							<small class="text-muted">{{$client->telephone}}</small><br>
							<small class="text-muted">{{$client->address}}</small>
						</div>
					</div>
				@endforeach
			</div>
		@else
			<p class="mt-3">No clients found.</p>
		@endif
	</div>
@endsection
