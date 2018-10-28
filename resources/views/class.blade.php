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
              </div>
            </nav>

            <main class="my-auto">
                <h1 class="h1">
                    Welcome to <span>{{ $class->name }}</span> Class
                </h1>
                <h5>
                    You have joined the class and would be notified of classes and assignments
                </h5>
                <div class="container">
                        <div class="row pt-5">
                            <div class="col-2"></div>
                            <div class="col-md-4 col-12 pt-3">
                                <div class="btn-group">
                                    <a class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" href="#">
                                            <i class="far fa-clock pr-1"></i>Pending Assignments
                                        <span class="caret"></span>
                                    </a>
                                    <ol class="dropdown-menu dropdown-width">
                                        @foreach($assignments as $assignment)
                                            <li class=pb-3> {{ strtoupper($assignment->class->name) }}
                                                <a class="btn btn-primary float-right" href="{{ route('assignment.submit', $assignment->id) }}">Submit</a>
                                            </li>
                                            <div class="dropdown-divider"></div>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>

                            <div class="col-md-4 col-12 pt-3">
                                    <div class="btn-group">
                                        <a class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" href="#">
                                                <i class="fas fa-history pr-3"></i>Past Assignment
                                            <span class="caret"></span>
                                        </a>
                                        <ol class="dropdown-menu dropdown-width">
                                                <li class=p-2> BEE 111 </li>
                                                <div class="dropdown-divider"></div>
                                                <li class="p-2"> MIA 311</li>
                                                <div class="dropdown-divider"></div>
                                                <li class="p-2"> FBI 311</li>
                                                <div class="dropdown-divider"></div>
                                                <li class="p-2"> CIA 311</li>
                                            </ol>
                                    </div>
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
