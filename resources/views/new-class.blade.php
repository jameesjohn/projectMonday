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
        </div>
    </nav>

    <div role="main" class="cover my-auto">
        <form  action="{{ route('create.class') }}" method="post">
            @csrf
            <input class="form-control" type="text" name="name" placeholder="Class Name" required><br/>
            <select class="form-control" name="level_id" required>
                <option value="">Select Level</option>
                @foreach($levels as $level)
                    <option value="{{ $level->id }}">{{ $level->level }}</option>
                @endforeach
            </select>

            <input type="hidden" name="lecturer_id" value="{{ Auth::user()->lecturer->id }}">

            <button class="btn btn-lg btn-secondary mt-5">Create Class</button>
        </form>
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
