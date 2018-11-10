@extends('layouts.listingL')

@section('listing.content')
    <div role="main" class="cover my-auto">
        <h1 class="cover-heading">Hello {{ Auth::user()->name }}</h1>
        <p class="lead">Welcome to Electrical Electronics E-learning Platform</p>
        <p class="lead">
            <a href="{{ route('new.class') }}" class="btn btn-lg btn-secondary mt-5">Create a Class</a>
            <a href="{{ route('create.assignment') }}" class="btn btn-lg btn-secondary mt-5">Create Assignment</a>
        </p>
        <p class="lead">
            <a href="{{ route('lecturer.classes') }}" class="btn btn-lg btn-secondary mt-3">Show Classes</a>
        </p>
    </div>

@endsection
