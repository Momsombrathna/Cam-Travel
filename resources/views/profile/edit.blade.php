@extends('layouts.app-master')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="{{ asset('assets/css/upload.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/draganddrop.css') }}">
    <title>Upload photo</title>
    <style>
      @media screen and (max-width: 420px) {
        .hide-on-small {
          display: none;
        }
      }
  </style>

</head>

@section('content')
    <br/><br/><br/>
    <div class="bg-light p-4 rounded">
        <h1>Update profile</h1>
        <div class="lead">

        </div>

        <div class="container mt-4 row">
            <div class="col hide-on-small ">
                <div class="container">
                    <div class="drag-area">
                      <div class="icon">
                        <div id="image-container" class="p-3">  Profile detail  </div>
                      </div>
                    </div>
                </div>
            </div>
            <form method="post" class="col" action="{{ route('profile.update') }}">
                @csrf
                <div class="mb-3">
                    <label for="image" class="form-label">Image Link</label>
                    <textarea value="{{ old('image') ?? $user->image }}"
                        type="text"
                        class="form-control"
                        name="image"
                        oninput="showImage(this.value)"
                        placeholder="Image Link" >{{ old('image') ?? $user->image }}</textarea>
                    @if ($errors->has('image'))
                        <span class="text-danger text-left">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input value="{{ old('username') ?? $user->username }}"
                        type="text"
                        class="form-control"
                        name="uasername"
                        placeholder="Username" >
                    @if ($errors->has('username'))
                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">phone</label>
                    <input value="{{ old('phone') ?? $user->phone }}"
                        type="text"
                        class="form-control"
                        name="phone"
                        placeholder="Phone Number" >
                    @if ($errors->has('phone'))
                        <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input value="{{ old('address') ?? $user->address }}"
                        type="text"
                        class="form-control"
                        name="address"
                        placeholder="Address" >
                    @if ($errors->has('address'))
                        <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                    @endif
                </div>


                <button type="submit" class="btn btn-primary">Update profile</button>
                <a href="{{ route('profile.index') }}" class="btn btn-default">Cancel</button>
            </form>
        </div>

    </div>
    @include('layouts.partials.showimage')

@endsection
