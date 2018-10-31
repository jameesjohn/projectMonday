@extends('layouts.listing')
            @section('listing.content')
                <div role="main" class="cover my-auto">
                    <h1 class="cover-heading mx-5">Welcome to Electrical and Electronics Engineering E-Learning Platform</h1>

                    <p class="lead mt-5 mb-3">
                        <a href="{{ route('class.listing') }}" class="btn btn-lg btn-secondary mt-5 mx-3">Start Here</a>

                    </p>
                    @guest
                    <div class="inner">
                        <p>You have to login first</p>
                    </div>
                    @endguest
                </div>
            @endsection

