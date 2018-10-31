
 @include('incudes.footer')
 @include('includes.head')


        <main class="my-auto">
            <h1 class="h1">
                Create Assignment for your students
            </h1>
            <div class="container">
                <div class="row pt-5">
                    {{-- <div class="col-2"></div> --}}
                    <div class="col-md-4 col-12 pt-3">
                        <form enctype="multipart/form-data" method="post" action="">
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLongTitle">Upload Assignment Here</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" enctype="multipart/form-data">
                                                    @csrf
                                                  <textarea rows="5" class="form-control mb-4"></textarea>
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
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Upload</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="col-md-4 col-12 pt-3">
                            <button type="button" class="btn btn-primary text-center" data-toggle="modal" data-target="#exampleModalLong">
                           Upload Assignment Here
                            </button>
                            
                    </div>
@extends('layouts.listingL')
@section('listing.content')

<main class="my-auto">
    <h1 class="h1">
        Create Assignment
    </h1>

    <div class="row">
        @if(session('message'))
        <div class="col-md-12">
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        </div>
        @endif
    </div>

    <div class="container">
        <div class="row pt-2">
            {{--
            <div class="col-2"></div> --}}
            <div class="col-md-4 col-12 pt-3">
                <form enctype="multipart/form-data" method="post" action="">

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-dark" id="exampleModalLongTitle">Create New Assignment</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" enctype="multipart/form-data">
                                        @csrf
                                        <textarea rows="5" name="content" placeholder="Your assignment content goes here" class="form-control mb-4"></textarea>
                                        <div class="form-label-group">
                                            <select name="class_id" class="form-control" required>
                                                            <option value="">Choose Class</option>
                                                        @foreach($classes as $class)
                                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                        @endforeach
                                                </select>
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4 col-12 pt-3">
                <p class="lead">
                    <button type="button" class="btn btn-lg btn-secondary mt-5" data-toggle="modal" data-target="#exampleModalLong">
                            Click here to add assignment
                        </button>
                    <a href="{{ route('lecturer.home') }}" class="btn btn-lg btn-secondary mt-5">Lecturer Home</a>
                </p>


            </div>


            <div class="col-2"></div>

        </div>
        <!--/row-->
    </div>
</main>



@endsection

@include('includes.footer')

