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
    <div role="main" class="cover my-auto">
        <h1 class="cover-heading mt-4">Hello {{ Auth::user()->name }}</h1>
        <p class="lead">Welcome to Electrical Electronics E-learning Platform</p>
        <p class="lead">
            <a href="#" class="btn btn-lg btn-secondary mt-5" data-toggle="modal" data-target="#createModalLong">Create a Class</a>
            <a href="#" class="btn btn-lg btn-secondary mt-5" data-toggle="modal" data-target="#exampleModalLong">Create Assignment</a>
        </p>
        <p class="lead">
            <a href="{{ route('lecturer.classes') }}" class="btn btn-lg btn-secondary mt-3">Show Classes</a>
            <a href="{{ route('information') }}" class="btn btn-lg btn-secondary mt-3">Information Board</a>
        </p>
    </div>

    {{-- Create Class Modal --}}
    <div class="modal fade text-dark" id="createModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">Create New Class</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" class="m-3" action="{{route('create.class')}}">
                            @csrf
                            <input class="form-control" type="text" name="name" placeholder="Class Name" required><br/>
                            <select class="form-control" name="level_id" required>
                                                        <option value="">Select Level</option>
                                                            @foreach($levels as $level)
                                                                <option value="{{ $level->id }}">{{ $level->level }}</option>
                                                            @endforeach
                                                    </select>

                            <input type="hidden" name="lecturer_id" value="{{ Auth::user()->lecturer->id }}">

                            <button class="btn btn-lg btn-dark mt-5 form-control">Create Class</button>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade text-dark" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Create Assignment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                </div>
            <form method="post"action="{{route('store.assignment')}}">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <input id="title" type="text" placeholder="{{ __('Title') }}" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                name="title" value="{{ old('title') }}" required autofocus> @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span> @endif
                        </div>
                       <div class="form-group">
                        <textarea id="description" rows="5" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" type="text" name="description"
                            placeholder="Announcement Description" required>{{ old('title') }}</textarea> @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('description') }}</strong>
                                                    </span> @endif
                    </div>

                        <div class="form-label-group">
                            <select name="class_id" class="form-control" required>
                                                <option value="">Class ...</option>
                                            @foreach($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name . '-'. $class->level->level. ' Level'}}</option>
                                            @endforeach
                                    </select>
                        </div>
                        <div class="form-group">
                            <input id="submitted" type="datetime-local" class="form-control{{ $errors->has('submitted') ? ' is-invalid' : '' }}" name="submitted_on"
                                value="{{ old('submitted') }}" required> @if ($errors->has('submitted'))
                            <span class="invalid-feedback" role="alert">
                                                                                                        <strong>{{ $errors->first('submitted') }}</strong>
                                                                                                    </span>                        @endif
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Create Assignment</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
