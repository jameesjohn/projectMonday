@extends('layouts.listing')
@section('listing.content')

<<<<<<< HEAD
    <title>Project Monday</title>

    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <link href="{{ asset('css/styles.css')}}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.min.css')}}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

</head>

<body class="text-center">

<div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">

    <nav class="navbar navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo" aria-controls="navbarTogglerDemo" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
        </button>
        <a class="navbar-brand" href="/"><h3 class="masthead-brand"> Portal</h3></a>


        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            </ul>
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            <li class="nav-item">
                <a class="nav-link" href="#">Classes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Forum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Lectures</a>
            </li>
        </div>
    </nav>

    <div class="container my-auto">
=======
>>>>>>> fb55540ea88f8cdf42b5fcc0f2f09a576c0f39d1
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
                            <th scope="col">Schedule</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($classes as $key => $class)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td><a href="{{ route('show.class', $class->id) }}">{{ $class->name }}</a></td>
                                <td>{{ $class->lecturer->user->name }}</td>
                                <td> {{ $class->created_at->diffForHumans() }}</td>
                                <td><a href="{{ route('show.class', $class->id) }}" class="btn btn-success">ENTER CLASS NOW</a></td>

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
            @else
                <h1> You've not joined a class yet.</h1>
                <p class="lead">
                    <a href="{{ route('class.listing') }}" class="btn btn-lg btn-secondary mt-5">Join a Class</a>
                </p>
            @endif

        </div>
@endsection
