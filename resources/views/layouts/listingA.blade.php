<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content='{{ csrf_field() }}''>
    <title>E-Blackboard System</title>

    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css')}}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.min.css')}}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

</head>

<body class="text-center">
    <div class="background-gradient">

        <nav class="navbar navbar-expand-md navbar-dark">
            <a class="navbar-brand" href="/">
                <h3 class="masthead-brand">E-Learning | Admin Dashboard </h3>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <a class="nav-link" href="{{route('lecturer.home')}}">Home <span class="sr-only">(current)</span></a> @guest
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
                            <a class="dropdown-item  text-dark" href="{{ route('new.class') }}">Create a Class</a>
                            <a class="dropdown-item  text-dark" href="{{ route('create.assignment') }}">Create Assignment</a>
                            <a class="dropdown-item  text-dark" href="{{ route('lecturer.classes') }}">Show Classes</a>
                            <a class="dropdown-item  text-dark" href="#">Forum</a>
                            <a class="dropdown-item  text-dark" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>

            </div>
        </nav>
        <div class="p-3 mx-auto mt-5">

            <div class="container mb-5">
                @yield('listing.content')
            </div>

            <footer class="mastfoot mt-5">
                <div class="inner">
                    <p>Designed with <i class="fas fa-heart"></i> by Elisha</p>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('js/jquery.js')}}"></script>
    <script src="{{ asset('js/app.js')}}"></script>
    <script src="{{ asset('js/script.js')}}"> </script>
    <script>
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    </script>
</body>

</html>
