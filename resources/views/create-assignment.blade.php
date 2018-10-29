<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Project Monday</title>

    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <link href="{{ asset('css/styles.css')}}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.min.css')}}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

</head>
<style>
    body{
        background-color: #333;
        background-image: url("img/class.jpg");
        background-size: cover;

    }

</style>

<body class="text-center">

<div class="background-gradient">
    <div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">

        <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
            </button>
            <a class="navbar-brand" href="#"><h3 class="masthead-brand"> Portal</h3></a>


            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                </ul>
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                <li class="nav-item">
                    <a class="nav-link" href="#">Classes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Forum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Lectures</a>
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

        <main class="my-auto">
            <h1 class="h1">
                Create Assignment for your student
            </h1>

            <div class="row">
                @if(session('message'))
                    <div class="col-md-12">
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    </div>
                @endif
            </div>

            <div class="container">
                <div class="row pt-5">
                    {{-- <div class="col-2"></div> --}}
                    <div class="col-md-4 col-12 pt-3">
                        <form enctype="multipart/form-data" method="post" action="">
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLongTitle">Create new Assignment</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" enctype="multipart/form-data">
                                                  @csrf
                                                  <textarea rows="5" name="content" placeholder="Your assignment content goes here" class="form-control mb-4"></textarea>
                                                    <div class="form-label-group">
                                                        <select name="class_id" class="form-control" required>
                                                                    <option value="">Class ...</option>
                                                                @foreach($classes as $class)
                                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="col-md-4 col-12 pt-3">
                            <p class="lead">
                                <button type="button" class="btn btn-lg btn-secondary mt-5" data-toggle="modal" data-target="#exampleModalLong">
                                    Click here to add assignment
                                </button>
                                <a href="{{ route('lecturer.home') }}" class="btn btn-lg btn-secondary mt-5">Lecturer Home</a>
                            </p>

                            
                    </div>


                    <div class="col-2"></div>

                </div>
                <!--/row-->
            </div>
        </main>

        <footer class="mastfoot mt-auto">
            <div class="inner">
                <p>Designed with <i class="fas fa-heart"></i> by bitsofcodes</p>
            </div>
        </footer>
    </div>
</div>
<script src="{{ asset('js/app.js')}}"></script>
</body>
</html>
