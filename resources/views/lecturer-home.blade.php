<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
        </button>
        <a class="navbar-brand" href="/"><h3 class="masthead-brand"> Portal</h3></a>


        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            </ul>
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            <li class="nav-item">
                <a class="nav-link" href="">Classes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/forum">Forum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/forum">Lectures</a>
            </li>


            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> @endif
                </li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </div>
    </nav>

    <div role="main" class="cover my-auto">
        <h1 class="cover-heading">Hello</h1>
        <p class="lead">Welcome to Electrical Electronics E-learning Platform</p>
        <p class="lead">
            <a href="{{ route('new.class') }}" class="btn btn-lg btn-secondary mt-5">Create a Class</a>
            <a href="{{ route('create.assignment') }}" class="btn btn-lg btn-secondary mt-5">Create Assignment</a>
            <a href="{{ route('assignments') }}" class="btn btn-lg btn-secondary mt-5">Show Assignments</a>
        </p>

        <p class="lead">
            <a href="{{ route('lecturer.classes') }}" class="btn btn-lg btn-secondary mt-5">Show Classes</a>
        </p>
    </div>

    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>Designed with <i class="fas fa-heart"></i> by bitsofcodes</p>
        </div>
    </footer>
</div>

<script src="{{ asset('js/app.js')}}"></script>
</body>
</html>
