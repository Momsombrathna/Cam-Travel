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
    <br/><br/><br/>

    {{-- Section Profile User --}}
    <section class="UserProfile">
        <div class="container py-5">

          <div class="row">
            <div class="col-lg-4">
             @auth
              <div class="card mb-4">
                <div class="card-body text-center">
                  <img src="{{ $user->image }}" alt="avatar"
                    class="rounded-circle img-fluid" style="width: 150px;">
                  <h5 class="my-3">{{ $user->username }}</h5>
                </div>
              </div>
              @endauth
            </div>
            <div class="col-lg-8">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Role</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ $user->name}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ $user->email }}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Phone</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">+855 {{ $user->phone }}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Address</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ $user->address }}</p>
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
