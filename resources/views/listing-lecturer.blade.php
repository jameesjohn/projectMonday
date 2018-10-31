@extends('layouts.listingL')
@section('listing.content')

<div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">



	<div class="container my-auto">
		<div class="row">
			@if(session('message'))
			<div class="col-md-12">
				<div class="alert alert-success">
					{{ session('message') }}
				</div>
			</div>
			@endif
		</div>
		<br/>

		<div class="row">
			<div class="col-md-12">
				<h1>
					Classes You've Created
				</h1>
			</div>
		</div>
		<div role="main" class="cover">
			@if ($classes->count() > 0)
			<div class="table-responsive">
				<table class="table table-hover table-dark">
					<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Class Name</th>
						<th scope="col">Lecturer</th>
						<th scope="col">Schedule</th>
						{{--<th scope="col">Action</th>--}}
					</tr>
					</thead>
					<tbody>
					@foreach($classes as $key => $class)
					<tr>
						<th scope="row">{{ $key+1 }}</th>
						<td>{{ $class->name }}</td>
						<td>{{ $class->lecturer->user->name }}</td>
						<td> {{ $class->schedule }}</td>
						{{--<td>--}}
							{{--<form method="post" action="{{ route('join.class') }}">--}}
								{{--@csrf--}}
								{{--<input type="hidden" value="{{ $class->id }}" name="class_id">--}}
								{{--<button class="btn btn-danger">Join</button>--}}
								{{--</form>--}}
							{{--</td>--}}
					</tr>
					@endforeach
					</tbody>
				</table>
			</div>

				<p class="lead">
					<a href="{{ route('new.class') }}" class="btn btn-lg btn-secondary mt-5">Create a Class</a>
					<a href="{{ route('lecturer.home') }}" class="btn btn-lg btn-secondary mt-5">Lecturer Home</a>
				</p>
			@else
			<h1> You've not created a class yet.</h1>
			<p class="lead">
				<a href="{{ route('new.class') }}" class="btn btn-lg btn-secondary mt-5">Create a class</a>
			</p>
			@endif

		</div>
	</div>
@endsection
