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
        @if ($assignmentsubscription->count() > 0)
            <div class="row">
                <div class="col-md-12 my-2">
                    <h1>
                        ScoreSheet for {{$assignmentsubscription->assignment->title}} Assignment.
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
                        <th scope="col">Score</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $key => $student)
                        <tr>
                            <td scope="row">{{ $key+1 }}</td>
                            <td>{{ $student->student->user->name }}</td>
                            <td>{{ $student->student->reg_number }}</td>
                            <td class="form-part text-center">
                                <p>{{ $student->score->score ?? 0}}</p>
                                <input style="display:none" type="text" placeholder="" class="form"
                                       value="{{$student->score->score ?? 0}}">
                            </td>
                            <td>
                                <a href="#" class="btn btn-success update" data-id="{{$student->id}}">
                                    Update Score
                                </a>
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


