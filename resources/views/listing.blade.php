
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
                    <h3>
                        Classes Available to your Level
                        @include('includes.error')
                    </h3>
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
                        <td>{{ $class->name }}</td>
                        <td>{{ $class->lecturer->user->name }}</td>
                        <td> {{ $class->created_at->diffForHumans() }}</td>
                        <td>
                            @if(!in_array(Auth::user()->student->id, $class->students->pluck('student_id')->toArray()))
                                <form method="post" action="{{ route('join.class') }}">
                                    @csrf
                                    <input type="hidden" value="{{ $class->id }}" name="class_id">
                                    <button class="btn btn-danger">Join</button>
                                </form>
                            @else
                                <button class="btn btn-success disabled">Joined</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        <a href="{{route('my.class')}}" class="btn btn-secondary my-4">See Joined Classes</a>
        </div>
        @else
        <h1>No classes available to join for your level yet. Check back.</h1>
        @endif {{--
        <p class="lead">--}} {{--
            <a href="#" class="btn btn-lg btn-secondary mt-5">Join a Class</a>--}} {{--
        </p>--}}
    </div>
   @endsection


