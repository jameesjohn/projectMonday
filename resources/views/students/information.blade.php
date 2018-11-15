
    @extends('layouts.listing')
   @section('listing.content')

    <div role="main" class="cover">
        @if (1)
            <div class="row">
                <div class="col-md-12">
                    <h1>
                        Information Board
                        @if (Auth::user()->role == 'lecturer')
                            <a href="{{ route('information.create') }}" class="btn btn-sm btn-primary">Make Announcement</a>
                        @endif
                        @include('includes.error')
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-6 bg-primary">
                    <h3 class="p-3">General Information</h3>
                    <ul class="list-group text-left my-3">
                      @if (Auth::user()->role != 'lecturer') @foreach ($generalInformations as $key => $generalInformation)
                        <li class="list-group-item text-dark">
                            <h2>{{$generalInformation->title}}</h2>
                            <p>{{$generalInformation->content}}</p>
                            <small>Announcement made by : {{$generalInformation->lecturer->user->name}}</small>
                        </li>
                        @endforeach
                            {{$generalInformations->links()}}
                            @else
                            @endif
                    </ul>
                </div>
                <div class="col-6 bg-success">
                    <h3 class="p-3">Level Information</h3>
                    <ul class="list-group text-left my-3">
                        @if (Auth::user()->role != 'lecturer')
                            @foreach ($levelInformations as $key => $levelInformation)
                                <li class="list-group-item text-dark">
                                    <h2>{{$levelInformation->title}}</h2>
                                    <p>{{$levelInformation->content}}</p>
                                    <small>Announcement made by : {{$levelInformation->lecturer->user->name}}</small>
                                </li>
                            @endforeach
                            {{$levelInformations->links()}}
                        @else

                        @endif

                        {{-- <li class="list-group-item text-dark">jiuiiiuiui Lorem ipsum dolor sit amet consectetur adipisicing elit. Est sequi fugiat deleniti! Est magni fuga aliquam
                            quas qui quae fugiat molestias saepe, impedit provident quod!</li>
                        <li class="list-group-item text-dark">jiuiiiuiui Lorem ipsum dolor sit amet consectetur adipisicing elit. Est sequi fugiat deleniti! Est magni fuga aliquam
                            quas qui quae fugiat molestias saepe, impedit provident quod!</li>
                        <li class="list-group-item text-dark">jiuiiiuiui Lorem ipsum dolor sit amet consectetur adipisicing elit. Est sequi fugiat deleniti! Est magni fuga aliquam
                            quas qui quae fugiat molestias saepe, impedit provident quod!</li> --}}

                    </ul>
                </div>
            </div>

        @endif

    </div>
   @endsection


