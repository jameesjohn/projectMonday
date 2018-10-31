@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="container">
   <div class="row">
     <div class="col-lg-7 col-xl-6 mx-auto">
       <div class="card card-signin flex-row my-5">
         <div class="card-body" id="card-body-margin">
           <h5 class="card-title text-center">Login</h5>
           <form class="form-signin px-auto">
             <div class="form-label-group">
               <input type="text" id="inputUserame" class="form-control" placeholder="Username" required autofocus>
               <label for="inputUserame">Username</label>
             </div>

             <div class="form-label-group">
               <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required>
               <label for="inputEmail">Email address</label>
             </div>

             <hr>

             <div class="form-label-group">
               <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
               <label for="inputPassword">Password</label>
             </div>

             <div class="form-label-group">
               <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" required>
               <label for="inputConfirmPassword">Confirm password</label>
             </div>

             <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
             <a class="d-block text-center mt-2" href="#">Sign In</a>
             <hr class="my-4">
             <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign up with Google</button>
             <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign up with Facebook</button>
           </form>
         </div>
       </div>
     </div>
   </div>
 </div> -->
@endsection
