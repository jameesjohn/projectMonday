
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
        @if ($subassignments->count() > 0)
            <div class="row">
                <div class="col-md-12">
                    <h3>
                     Students That Submitted Assignment
                        @include('includes.error')
                    </h3>
                </div>
            </div>
        <div class="table-responsive">
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">S/N</th>
                        <th scope="col"> Assignment Title</th>
                        {{-- <th scope="col "> Description</th> --}}
                        <th scope="col">Students Name</th>
                        <th scope="col">Level</th>
                        <th scope="col">Submissions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subassignments as $key => $subassignment)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $subassignment->assignment->title }}</td>
                        <td>{{ dd($subassignment->student) }}</td>
                        {{-- <td class="text-left">{{ $assignment->description }}</td> --}}
                        {{-- <td>{{$assignment->class->name}}</td>
                        <td>{{$assignment->class->level->level}}</td> --}}
                    {{-- <td> <a href="{{route('see.submission')}}" class="btn btn-success">See Submissions</a></td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <h1>No Assignments created for this class yet. Check back.</h1>
        @endif

    </div>
   @endsection


