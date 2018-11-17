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
<div class="row">
    <div class="col-md-6 mx-auto">
        <div role="main" class="cover my-auto ">
            <div class="card">
                <div class="card-header text-dark">
                    <p class="lead">Edit Assignment</p>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                {{-- <label for="" class="text-left text-dark">Title</label> --}}
                                <input id="title" type="text" placeholder="{{ __('Title') }}" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                    name="title" value="{{ $assignment->title}}" required autofocus> @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('title') }}</strong>
                                                    </span> @endif
                            </div>
                            <input type="hidden" name="class_id" value="{{$assignment->class_id}}">
                            <div class="form-group">
                                {{-- <label for="" class="text-left text-dark">Description</label> --}}
                                <textarea id="description" rows="5" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="description"
                                    placeholder="Description">{{ $assignment->description}} </textarea>@if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('description') }}</strong>
                                                    </span> @endif
                            </div>


                            <div class="form-group">
                                {{-- <label for="">Sumission Date</label> --}}
                                <input id="submitted" type="datetime-local" class="form-control{{ $errors->has('submitted') ? ' is-invalid' : '' }}" name="submitted_on"
                                    value="{{$assignment->submitted_on->format('Y-m-d\TH:i:s') }}" required> @if ($errors->has('submitted'))
                                <span class="invalid-feedback" role="alert">
                                                                                                                        <strong>{{ $errors->first('submitted') }}</strong>
                                                                                                                    </span> @endif
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success form-control">Edit Assignment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
