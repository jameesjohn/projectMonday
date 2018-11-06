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
<main class="my-auto">
    <h1 class="h1">
        Welcome to <span>{{ $class->name }}'s</span> Class
    </h1>
    <h5>
    You have joined {{$class->name}}'s class and would be notified of classes and assignments
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
                        @forelse($pendingAssignments as $assignment)
                        <li class=pb-3> {{ strtoupper($assignment->class->name) }}
                            <a class="btn btn-primary float-right" href="{{ route('assignment.submit', $assignment->id) }}">Open</a>
                        </li>
                        <div class="dropdown-divider"></div>
                        @empty
                        <li class=p-2> No Pending Assignments</li>
                        <div class="dropdown-divider"></div>
                        @endforelse
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
                        @forelse($submittedAssignments as $sub)
                        <li class=p-2> {{ $sub->assignment->class->name }}</li>
                        <div class="dropdown-divider"></div>
                        @empty
                        <li class=p-2> No Submitted assignments</li>
                        <div class="dropdown-divider"></div>
                        @endforelse
                    </ol>
                </div>
            </div>
            <div class="col-2"></div>

        </div>
        <!--/row-->
    </div>
</main>
@endsection
