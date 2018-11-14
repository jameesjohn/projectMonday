
    @extends('layouts.listing')
   @section('listing.content')

    <div role="main" class="cover">
        @if (1)
            <div class="row">
                <div class="col-md-12">
                    <h1>
                        Information Board
                        @include('includes.error')
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-6 bg-primary">
                    <h3 class="p-3">General Information</h3>
                    <ul class="list-group text-left my-3">
                        <li class="list-group-item text-dark">jiuiiiuiui Lorem ipsum dolor sit amet consectetur adipisicing elit. Est sequi fugiat deleniti! Est magni fuga aliquam quas qui quae fugiat molestias saepe, impedit provident quod!</li>
                        <li class="list-group-item text-dark">jiuiiiuiui Lorem ipsum dolor sit amet consectetur adipisicing elit. Est sequi fugiat deleniti! Est magni fuga aliquam quas qui quae fugiat molestias saepe, impedit provident quod!</li>
                        <li class="list-group-item text-dark">jiuiiiuiui Lorem ipsum dolor sit amet consectetur adipisicing elit. Est sequi fugiat deleniti! Est magni fuga aliquam quas qui quae fugiat molestias saepe, impedit provident quod!</li>
                        <li class="list-group-item text-dark">jiuiiiuiui Lorem ipsum dolor sit amet consectetur adipisicing elit. Est sequi fugiat deleniti! Est magni fuga aliquam quas qui quae fugiat molestias saepe, impedit provident quod!</li>

                    </ul>
                </div>
                <div class="col-6 bg-success">
                    <h3 class="p-3">Level Information</h3>
                    <ul class="list-group text-left my-3">
                        <li class="list-group-item text-dark">jiuiiiuiui Lorem ipsum dolor sit amet consectetur adipisicing elit. Est sequi fugiat deleniti! Est magni fuga aliquam
                            quas qui quae fugiat molestias saepe, impedit provident quod!</li>
                        <li class="list-group-item text-dark">jiuiiiuiui Lorem ipsum dolor sit amet consectetur adipisicing elit. Est sequi fugiat deleniti! Est magni fuga aliquam
                            quas qui quae fugiat molestias saepe, impedit provident quod!</li>
                        <li class="list-group-item text-dark">jiuiiiuiui Lorem ipsum dolor sit amet consectetur adipisicing elit. Est sequi fugiat deleniti! Est magni fuga aliquam
                            quas qui quae fugiat molestias saepe, impedit provident quod!</li>
                        <li class="list-group-item text-dark">jiuiiiuiui Lorem ipsum dolor sit amet consectetur adipisicing elit. Est sequi fugiat deleniti! Est magni fuga aliquam
                            quas qui quae fugiat molestias saepe, impedit provident quod!</li>

                    </ul>
                </div>
            </div>

        @else
        <h1>No classes available for your level yet. <br>Check back Soon.</h1>
        <a href="{{route('my.class')}}" class="btn btn-secondary my-4">Information Board</a>
        @endif {{--
        <p class="lead">--}} {{--
            <a href="#" class="btn btn-lg btn-secondary mt-5">Join a Class</a>--}} {{--
        </p>--}}
    </div>
   @endsection


