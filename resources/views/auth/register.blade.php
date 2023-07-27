@extends('layouts.app-master')
@extends('layouts.auth-master')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
<br><br>
<div class="py-5 registercard">
        <div class="container">
          <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-12 col-xl-11">
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                      <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-1 mt-1 textmode">Sign up</p>

                        <form class="mx-1 mx-md-1" method="post" action="{{ route('register.perform') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="form-group form-floating mb-2">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
                                <label for="floatingEmail">Email address</label>
                                @if ($errors->has('email'))
                                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group form-floating mb-2">
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
                                <label for="floatingName">Username</label>
                                @if ($errors->has('username'))
                                    <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                                @endif
                            </div>

                            <div class="form-group form-floating mb-2">
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
                                <label for="floatingPassword">Password</label>
                                @if ($errors->has('password'))
                                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="form-group form-floating mb-2">
                                <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
                                <label for="floatingConfirmPassword">Confirm Password</label>
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>

                            <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                        </form>
                    </div>

                    <div class="col-md-10 image col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                        class="img-fluid" alt="Sample image">
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>
@endsection
