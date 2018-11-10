
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
            @if ($studentsInClass->count() > 0)
                <div class="row">
                    <div class="col-md-12 my-4">
                        <h1>
                            Students in  {{$studentsInClass[0]->class->name}}'s Class. <br>
                            @include('includes.error')
                        </h1>
                        <h3>{{$studentsInClass->count()}} Student(s)</h3>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-dark">
                        <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Students Name</th>
                                <th scope="col">Reg. Number</th>
                                <th scope="col">Joined Class</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentsInClass as $key => $studentInClass)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td scope="row">{{  $studentInClass->student->user->name }}</td>
                                <td scope="row">{{  $studentInClass->student->reg_number }}</td>
                                <td scope="row">{{  $studentInClass->created_at->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h1 class="h1">No Student has submitted assignments yet. Check back.</h1>
            @endif

        </div>
    @endsection


