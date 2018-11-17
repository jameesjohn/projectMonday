
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
            @if ($subassignments->count() > 0)
                <div class="row">
                    <div class="col-md-12 my-4">
                        <h1>
                            Students That Submitted <br> {{$subassignments[0]->assignment->title}} Assignment.
                            @include('includes.error')
                        </h1>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-dark">
                        <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Students Name</th>
                                <th scope="col">Reg. Number</th>
                                <th scope="col">Time Submitted</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subassignments as $key => $subassignment)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $subassignment->student->user->name }}</td>
                                    <td>{{ $subassignment->student->user->student->reg_number}}</td>
                                    <td>{{ $subassignment->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{asset('storage/assignments/'. $subassignment->assignment->class->lecturer->user->name. '/'.$subassignment->assignment->class->name . '\'s class/'. $subassignment->assignment->title. '/' . $subassignment->assignment->title . '-' . $subassignment->student->user->name . '.pdf' )}}" class="btn btn-success">Download Here</a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h1 class="h1"></h1>
                <div class=" mt-5 mb-md-5 mb-0">
                    <h1 class="h1 pt-5">No Student has submitted assignments yet. <br> Check back.</h1>
                </div>
            @endif

        </div>
    @endsection


