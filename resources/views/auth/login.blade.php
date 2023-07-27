@extends('layouts.app-master')
@extends('layouts.auth-master')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
<br><br>

    <div class="container  py-5">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-xl-10" >
          <div class="card rounded-5 text-black">
            <div class="row g-0 ">
              <div class="col-lg-6 ">
                <div class="card-body p-md-5 mx-md-4" style="border-radius: 25px;">

                  <div class="text-center">
                      <img src="{{URL::asset('images/logo.png')}}" alt="logo" height="auto" width="230px"> <br><br>
                    <h4 class="mt-1 mb-5 pb-1 textmode">Welcome Back</h4>
                  </div>


                    <form method="post" action="{{ route('login.perform') }}">
                        <p class="textmode">Please login to your account</p>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        @include('layouts.partials.messages')

                        <div class="form-group form-floating mb-3">
                            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
                            <label for="floatingName">Email or Username</label>
                            @if ($errors->has('username'))
                                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                            @endif
                        </div>

                        <div class="form-group form-floating mb-3">
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
                            <label for="floatingPassword">Password</label>
                            @if ($errors->has('password'))
                                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>

                    </form>

                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                  <h4 class="mb-4">We are more than just a company</h4>
                  <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection


