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
        @if ($admins->count() > 0)

            <br><br>
            <ul class="nav nav-pills mb-3 ml-md-5 pl-md-5" id="pills-tab" role="tablist">
                <li class="nav-item mx-4">
                    <a class="nav-link px-4 active" id="pills-home-tab" data-toggle="pill" href="#pills-allCampaigns" role="tab" aria-controls="pills-all" aria-selected="true">
                        All Users
                        <i class="badge badge-warning">{{$users->count()}}</i>
                    </a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link px-4" id="pills-profile-tab" data-toggle="pill" href="#pills-trendingCampaigns" role="tab" aria-controls="pills-trending" aria-selected="false">
                        Admin Users
                        <i class="badge badge-warning">{{$admins->count()}}</i>

                    </a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link px-4" id="pills-contact-tab" data-toggle="pill" href="#pills-newestCampaigns" role="tab" aria-controls="pills-newest" aria-selected="false">
                        Lecturer Users
                        <i class="badge badge-warning">{{$lecturers->count()}}</i>

                    </a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link px-4" id="pills-contact-tab" data-toggle="pill" href="#pills-mostFundedCampaigns" role="tab" aria-controls="pills-mostfunded" aria-selected="false">
                        Student Users
                        <i class="badge badge-warning">{{$students->count()}}</i>

                    </a>
                </li>

            </ul>

            <div class="tab-content my-5" id="pills-tabContent">
                {{--All Users--}}
                <div class="tab-pane fade show active" id="pills-allCampaigns" role="tabpanel" aria-labelledby="pills-all-tab">
                    <div class="container my-4">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-hover table-dark">
                                    <thead>
                                    <tr>
                                        <th scope="col">S/N</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Role</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $key => $user)
                                            <tr>
                                                <th scope="row">{{ $key+1 }}</th>
                                                <td scope="row">{{ $user->name }}</td>
                                                <td scope="row"> {{ ucwords($user->role) }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="row my-4 text-center">
                                <div class="col-md-5 col-12 mx-auto">
                                    {{$users->links()}}
                                </div>
                            </div>

                        </div>



                    </div>
                </div>
                {{--Admin User --}}
                <div class="tab-pane fade" id="pills-trendingCampaigns" role="tabpanel" aria-labelledby="pills-trending-tab">
                    <div class="container my-4">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-hover table-dark">
                                    <thead>
                                    <tr>
                                        <th scope="col">S/N</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admins as $key => $admin)
                                        <tr>
                                            <th scope="row">{{ $key+1 }}</th>
                                            <td scope="row">{{ $admin->name }}</td>
                                            <td scope="row">
                                                <a href="#" class="btn btn-success mb-2 mb-md-0 disabled"> View Admin </a>
                                                <a  class="btn btn-danger del disabled"> Delete Admin </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
                {{--Lecturer User--}}
                <div class="tab-pane fade" id="pills-newestCampaigns" role="tabpanel" aria-labelledby="pills-newest-tab">
                    <div class="container my-4">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-hover table-dark">
                                    <thead>
                                    <tr>
                                        <th scope="col">S/N</th>
                                        <th scope="col">Name</th>
                                        {{--<th scope="col">Level Handled</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lecturers as $key => $lecturer)
                                        <tr>
                                            <th scope="row">{{ $key+1 }}</th>
                                            <td scope="row">{{ $lecturer->name }}</td>
                                            {{--<td scope="row">--}}
                                                {{--@foreach($lecturer->lecturerclasses->lecturerlevel as $classes)--}}
                                                    {{--{{dd($classes)}}--}}
                                                {{--@endforeach--}}
                                            {{--</td>--}}
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>



                    </div>
                </div>
                {{--Student Users--}}
                <div class="tab-pane fade" id="pills-mostFundedCampaigns" role="tabpanel" aria-labelledby="pills-mostfunded-tab">

                    <div class="container my-4">
                        <div class="row">
                            @forelse ($students as $student)

                            @empty

                            @endforelse

                        </div>



                    </div>

                </div>
            </div>

            {{--<div class="table-responsive">--}}
                {{--<table class="table table-hover table-dark">--}}
                    {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th scope="col">S/N</th>--}}
                            {{--<th scope="col">Class Name</th>--}}
                            {{--<th scope="col">Level</th>--}}
                            {{--<th scope="col">Action</th>--}}
                        {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody>--}}
                        {{--@foreach($classes as $key => $class)--}}
                            {{--<tr>--}}
                                {{--<th scope="row">{{ $key+1 }}</th>--}}
                                {{--<td scope="row">{{ $class->name }}</td>--}}
                                {{--<td scope="row"> {{ $class->level->level }}</td>--}}
                                {{--<td scope="row">--}}
                                    {{--<a href="{{route('show.assignment',$class->id)}}" class="btn btn-success mb-2 mb-md-0">Enter Class</a>--}}
                                {{--<a data-toggle="modal" data-target="#exampleModalLong" data-id="{{$class->id}}" class="btn btn-danger del" >Delete Class </a>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-3 mx-auto">
                    {{--{{$classes->links()}}--}}

                </div>
            </div>
        @else
            <h1> No User Yet</h1>
            <p class="lead">
                <a href="{{ route('new.class') }}" class="btn btn-lg btn-secondary mt-5">Create a User </a>
            </p>
        @endif

    </div>

    {{-- Delete Modal --}}
    {{--<div class="modal fade text-dark" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">--}}
        {{--<div class="modal-dialog" role="document">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<h4 class="modal-title" id="exampleModalLongTitle">Delete Class</h4>--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
                {{--<h3 class="px-4 py-3">Are you sure you want to delete this class?</h3>--}}
                {{--<form enctype="multipart/form-data" method="POST" id ="deleteForm">--}}
                    {{--@csrf--}}
                    {{--<div class="py-3">--}}
                        {{--<button type="submit" class="btn btn-success " >Delete</button>--}}
                        {{--<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection
