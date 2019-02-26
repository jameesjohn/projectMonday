@extends('layouts.listing')

@section('listing.content')

    <div class="container">
       <div class="row text-dark">
         <div class="col-lg-7 col-xl-6 mx-auto">
           <div class="card card-signin flex-row my-5">

             <!-- <div class="card-img-left d-none d-md-flex">
                Background image for card set in CSS!
             </div> -->

             <div class="card-body" id="card-body-margin">
                @include('includes.error')
             <div class="card-body" id="card-body-margin" style="margin-left: -12px;">
               <h5 class="card-title text-center">Create User</h5>
               <form class="form-signin px-auto" method="post" action="/register">
                @csrf
                 <div class="form-group">
                   <input type="text" name="name" id="inputUserame" class="form-control" placeholder="Full Name" required autofocus>
                 </div>

                 <div class="form-group">
                   <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required>
                 </div>
                 <div class="form-group">
                   <input type="text" name="reg_number" id="inputRegNumber" class="form-control" placeholder="Role" required>
                 </div>

                   <div class="form-group">
                       <select name="level_id" class="form-control" required>
                                <option value="">Level ...</option>
                            @foreach($levels as $level)
                                <option value="{{ $level->id }}">{{ $level->level }}</option>
                           @endforeach
                       </select>
                   </div>

                 <hr>

                 <div class="form-group">
                   <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                 </div>

                 <div class="form-group">
                   <input type="password" name="password_confirmation" id="inputConfirmPassword" class="form-control" placeholder="Confirm Password" required>
                 </div>

                 <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Create User</button>

               </form>
             </div>
           </div>
         </div>
       </div>
     </div>




@endsection
