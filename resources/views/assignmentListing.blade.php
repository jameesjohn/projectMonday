   @extends('layouts.listingL')
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
        @if ($assignments->count() > 0)
            <div class="row">
                <div class="col-md-12 my-4">
                    <h1>
                       Assignments Created for {{ $assignments[0]->class->name}} class <br>
                       <span class="small"> ({{$assignments[0]->class->level->level}} Level)</span>
                        @include('includes.error')
                    </h1>
                </div>
            </div>
        <div class="table-responsive">
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">S/N</th>
                        <th scope="col"> Title</th>
                        <th scope="col">Submitted On</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assignments as $key => $assignment)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $assignment->title }}</td>
                        <td>{{ $assignment->submitted_on->diffForHumans() }}</td>
                        <td>
                            <a href="/assignments/submitted/{{$assignment->id}}" class="btn btn-success">See Submissions
                                @if ($assignment->subscribers->count() > 0)
                                <span class="badge badge-danger">{{$assignment->subscribers->count()}}</span>
                                @endif
                            </a>
                            <a href="/assignments/{{$assignment->id}}/delete" class="btn btn-danger">Delete Assignment </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <h1>No Assignments created for this class yet.</h1>
        <a href="{{ route('create.assignment') }}" class="btn btn-lg btn-secondary mt-5">Create Assignment</a>
        @endif

    </div>
   @endsection


