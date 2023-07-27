<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>

    @extends('layouts.app-master')
    @extends('layouts.auth-master')
    @section('content')
    <br/><br/><br/>

    {{-- Section Profile User --}}
    <section class="UserProfile">
        <div class="container py-5">

          <div class="row">
            <div class="col-lg-4">
             @auth
              <div class="card mb-4">
                <div class="card-body">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                    class="rounded-circle img-fluid" style="width: 150px;">
                  <h5 class="my-3 textmode">{{auth()->user()->username}}</h5>
                </div>
                <div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Change Profile</button>
                </div>
              </div>
              @endauth
            </div>
            <div class="col-lg-8 textmode">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-sm-9 ">
                      <p class="text-muted mb-0">{{auth()->user()->username}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row ">
                    <div class="col-sm-3 ">
                      <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9 ">
                      <p class="text-muted mb-0">{{auth()->user()->email}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3 ">
                      <p class="mb-0">Phone</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">(097) 234-5678</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3 ">
                      <p class="mb-0">Address</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                    </div>
                  </div>
                </div>
              </div>

          </div>
        </div>
      </section>
      {{-- End Section Profile User --}}

      {{-- tap photo and place under profile --}}
      <section class="photo-place">

      </section>
      {{-- End tap photo and place under profile --}}

</body>
</html>

@endsection
