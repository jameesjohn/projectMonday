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
						<th scope="col">S/N</th>
						<th scope="col">Class Name</th>
						<th scope="col">Level</th>
						<th scope="col">Action</th>
					</tr>
					</thead>
					<tbody>
					@foreach($classes as $key => $class)
					<tr>
						<th scope="row">{{ $key+1 }}</th>
						<td>{{ $class->name }}</td>
						<td> {{ $class->level->level }}</td>
                        <td >
                            <a href="/lecturer/assignments/{{$class->id}}" class="btn btn-success">See Assignments </a>
                        </td>

					</tr>
					@endforeach
					</tbody>
				</table>
			</div>
			@else
                <h1> You've not created a class yet.</h1>
                <p class="lead">
                    <a href="{{ route('new.class') }}" class="btn btn-lg btn-secondary mt-5">Create a class</a>
                </p>
			@endif

		</div>
	</div>
@endsection
