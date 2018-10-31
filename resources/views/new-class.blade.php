@extends('layouts.listingL')
@section('listing.content')

<div class="row">
    <div class="col-md-6 mx-auto">
        <div role="main" class="cover my-auto ">
            <form action="{{ route('create.class') }}" method="post">
                @csrf
                <input class="form-control" type="text" name="name" placeholder="Class Name" required><br/>
                <select class="form-control" name="level_id" required>
                            <option value="">Select Level</option>
                            @foreach($levels as $level)
                                <option value="{{ $level->id }}">{{ $level->level }}</option>
                            @endforeach
                        </select>

                <input type="hidden" name="lecturer_id" value="{{ Auth::user()->lecturer->id }}">

                <button class="btn btn-lg btn-primary mt-5 form-control">Create Class</button>
            </form>

            <a href="{{ route('lecturer.home') }}" class="btn btn-lg btn-success mt-1 form-control">Lecturer Home</a>
        </div>
    </div>
</div>




@endsection

