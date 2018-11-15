@extends('layouts.listingL')
@section('listing.content')

<div class="row">
    <div class="col-md-6 mx-auto">
        <div role="main" class="cover my-auto ">
            <div class="card">
                <div class="card-header text-dark">
                  <p class="lead">Make Announcement</p>
                </div>
                <div class="card-body">
                    <form action="" method="post">
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
</div>

@endsection
