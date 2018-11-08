@extends('layouts.listing')
@section('listing.content')



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
                <div class="row">
                    <div class="col-md-12">
                        <h1>
                            Classes I've Joined
                        </h1>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-dark">
                        <thead>
                        <tr>
                            <th scope="col">S/N</th>
                            <th scope="col">Class Name</th>
                            <th scope="col">Lecturer</th>
                            {{-- <th scope="col">Schedule</th> --}}
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($classes as $key => $class)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td><a href="{{ route('show.class', $class->id) }}">{{ $class->name }}</a></td>
                                <td>{{ $class->lecturer->user->name }}</td>
                                {{-- <td> {{ $class->created_at->diffForHumans() }}</td> --}}
                                <td><a href="{{ route('show.class', $class->id) }}" class="btn btn-success">ENTER CLASS NOW</a></td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h1> You've not joined a class yet.</h1>
                <p class="lead">
                    <a href="{{ route('class.listing') }}" class="btn btn-lg btn-secondary mt-5">Join a Class</a>
                </p>
            @endif

        </div>
@endsection
