   @extends('layouts.listingL')
   @section('listing.content')

        <div class="row">
            @if(session('message'))
                <div class="col-6 mx-auto">
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                </div>
            @endif
        </div>

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
                    <table class="table table-hover table-dark mb-md-5 mb-0">
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
                                        <a href="{{route('see.submission',$assignment->id)}}" class="btn btn-success mb-2 mb-md-0">See Submissions
                                            <span class="badge badge-danger">{{$assignment->subscribers->count()}}</span>
                                        </a>
                                        <a href="{{route('edit.assignment', $assignment->id)}}" class="btn btn-warning">Edit </a>
                                        <a data-toggle="modal" href="" data-id="{{$assignment->id}}" class="btn btn-danger assDel" data-target="#deleteModalLong">Delete </a>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <th></th>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        @if($studentsInClass > 0)
                                            <a href="{{route('see.class.students', $studentInClass->class_id)}}" class="btn btn-dark form-control">
                                                See Students in Class
                                                <span class="badge badge-primary">{{$studentsInClass}}</span>
                                            </a>
                                        @else
                                            <a href="#" class="btn btn-dark form-control">
                                                No Student in Class

                                            </a>
                                        @endif
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-3 mx-auto">
                        {{$assignments->links()}}

                    </div>
                </div>
            @else
                <div class=" mt-5 mb-md-5 mb-0">
                    <h1 class="h1 pt-5">No Assignments created for this class yet.</h1>
                    <a href="{{ route('create.assignment') }}" class="btn btn-lg btn-secondary my-5">Create Assignment</a>
                    @if($studentsInClass > 0)
                        <a href="{{route('see.class.students', $studentInClass->class_id)}}" class="btn btn-lg btn-secondary my-5">
                            See Students in Class
                            <span class="badge badge-primary">{{$studentsInClass}}</span>
                        </a>
                    @else
                        <a href="#" class="btn btn-secondary btn-lg disabled my-5">
                            No Student in Class
                        </a>
                    @endif
                </div>
            @endif

        </div>
        {{-- Delete Modal --}}
        <div class="modal fade text-dark" id="deleteModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">Delete Class</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <h3 class="px-4 py-3">Are you sure you want to delete this assignment?</h3>
                    <form enctype="multipart/form-data" method="POST" id="deleteAss">
                        @csrf
                        <div class="py-3">
                            <button type="submit" class="btn btn-success ">Delete</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   @endsection


