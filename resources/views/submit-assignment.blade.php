@extends('layouts.listing')
@section('listing.content')
    <main class="my-auto">
        <h1 class="h1 mb-4 text-center px-4">
        You want to submit assignment on {{$assignment->title}} for <span> {{ $assignment->class->name }}'s</span> Class
    </h1>

        <div class="table-responsive">
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">Assignment Topic</th>
                        <th scope="col">Description</th>
                        <th scope="col">Submit Before</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $assignment->title }}</td>
                        <td class="text-left">{{ $assignment->description }}</td>
                        <td> {{ $assignment->submitted_on->diffForHumans() }}</td>
                        <td>
                            @if ($assignment->submitted_on->gt($now) )
                                <button type="button" class="btn btn-secondary text-center btn-sm" data-toggle="modal" data-target="#exampleModalLong">
                                        Submit Assignment
                                </button>
                            @else
                                <button type="button" class="btn btn-secondary text-center btn-sm disabled" data-toggle="modal">
                                    Submitting not availabe
                                </button>
                            @endif

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
    <div class="modal fade text-dark" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Submit Assignment Here</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form enctype="multipart/form-data" method="POST" action="">
                    @csrf
                    <div class="row mx-auto my-5">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input id="assignmentFile" type="file" class="form-control{{ $errors->has('assignmentFile') ? ' is-invalid' : '' }}" name="assignmentFile"
                                    required> @if($errors->has('file'))
                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('assignmentFile') }}</strong>
                                                            </span> @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-success form-control">Submit</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection
