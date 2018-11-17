
    @extends('layouts.listing')
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
        @if (1)
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-md-3">
                        Information Board
                        @if (Auth::user()->role == 'lecturer')
                            <a data-toggle="modal"  class="btn btn-sm btn-primary" data-target="#makeModalLong">Make Announcement</a>
                        @endif
                        @include('includes.error')
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 bg-primary mb-3 mb-md-0">
                    <h3 class="p-3">General Information</h3>
                    <ul class="list-group text-left my-3">
                      @foreach ($generalInformations as $key => $generalInformation)
                        <li class="list-group-item text-dark">
                            <h2>{{$generalInformation->title}}</h2>
                            <p>{{$generalInformation->content}}</p>
                        </li>
                        @endforeach
                            {{$generalInformations->links()}}
                    </ul>
                </div>
                <div class="col-12 col-md-6 bg-success">
                    <h3 class="p-3">Level Information</h3>
                    <ul class="list-group text-left my-3">
                            @foreach ($levelInformations as $key => $levelInformation)
                                <li class="list-group-item text-dark">
                                    <h2>{{$levelInformation->title}}</h2>
                                    <p>{{$levelInformation->content}}</p>
                                    <small>Announcement made by : {{$levelInformation->lecturer->user->name}}
                                        @if (Auth::user()->role == 'lecturer')
                                        <a data-toggle="modal" data-id="{{$levelInformation->id}}" class="mx-2 float-right btn btn-danger btn-sm infoDel" data-target="#informationModalLong">Delete</a>

                                            <a href="{{route('edit.notification', $levelInformation->id)}}" class="float-right btn btn-warning btn-sm ">Edit</a>
                                        @endif
                                    </small>
                                </li>
                            @endforeach
                            {{$levelInformations->links()}}

                    </ul>
                </div>
            </div>

        @endif

    </div>

    @if (Auth::user()->role == 'lecturer')

    {{-- Delete Modal --}}
    <div class="modal fade text-dark" id="informationModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Delete Class</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                </div>
                <h3 class="px-4 py-3">Are you sure you want to delete this Announcement?</h3>
                <form enctype="multipart/form-data" method="POST" id="deleteInfo">
                    @csrf
                    <div class="py-3">
                        <button type="submit" class="btn btn-success ">Delete</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Make Announcement Modal --}}
    <div class="modal fade text-dark" id="makeModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Make Announcement</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('information.create') }}" method="POST" id="deleteInfo">
                       @csrf
                        <input class="form-control" type="text" name="title" placeholder="Announcement Name" required><br/>
                        <input class="form-control" type="hidden" name="type" value="level"><br/>
                        <textarea class="form-control" type="text" name="content" placeholder="Announcement Description" required></textarea><br>
                        <select class="form-control" name="level_id" required>
                                                        <option value="">Select Level</option>
                                                            @foreach($levels as $level)
                                                                <option value="{{ $level->id }}">{{ $level->level }}</option>
                                                            @endforeach
                                                    </select>

                        <input type="hidden" name="lecturer_id" value="{{ Auth::user()->lecturer->id }}">

                        <button class="btn btn-lg btn-dark mt-5 form-control">Make Announcement</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endif


   @endsection


