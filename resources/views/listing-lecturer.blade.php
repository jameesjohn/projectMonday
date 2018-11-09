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


		<div role="main" class="cover">
            @if ($classes->count() > 0)
            <h1>
                Classes You've Created
            </h1>
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
                            <a href="/lecturer/assignments/{{$class->id}}" class="btn btn-success">Enter Class</a>

                            <a href="/lecturer/class/{{$class->id}}/delete" class="btn btn-danger" >Delete Class </a>
                            {{-- <a href="/lecturer/assignments/{{$class->id}}/delete" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalLong">Delete Class </a> --}}
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

    {{-- Delete Modal --}}
    {{-- <div class="modal fade text-dark" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Delete Class</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <h3 class="px-4 py-3">Are you sure you want to delete this class?</h3>
                <form enctype="multipart/form-data" method="POST" action="">
                    @csrf
                    <div class="py-3">
                        <button type="submit" class="btn btn-success ">Delete</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </form>

            </div>
        </div>
    </div> --}}
@endsection
