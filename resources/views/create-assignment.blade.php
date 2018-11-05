@extends('layouts.listingL')
@section('listing.content')
        <main class="my-auto">
            <h1 class="h1">
                Create Assignment for your students
            </h1>

                <!-- Modal -->
                <div class="modal fade text-dark" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLongTitle">Upload Assignment Here</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <form method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    <div class="form-group">
                                        <input id="title" type="text" placeholder="{{ __('Title') }}" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"
                                            value="{{ old('title') }}" required autofocus> @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('title') }}</strong>
                                                                    </span> @endif
                                    </div>
                                    <div class="form-group">
                                        <textarea id="description" rows="5" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="description" >Description {{ old('title') }} </textarea>@if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('description') }}</strong>
                                                                    </span> @endif
                                    </div>
                                    <div class="form-label-group">
                                        <select name="class_id" class="form-control" required>
                                                    <option value="">Class ...</option>
                                                @foreach($classes as $class)
                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
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

            <div class="col-md-7  mx-auto mt-5">
                <button type="button" class="btn btn-primary text-center form-control btn-lg" data-toggle="modal" data-target="#exampleModalLong">
                Create Assignment
                </button>

            </div>
        </main>
@endsection


