@extends('layouts.app-master')

@section('content')
    <br/><br/><br/>
    <div class="bg-light p-4 rounded">
        <h1>Update profile</h1>
        <div class="lead">

        </div>

        <div class="container mt-4">
            <form method="post" action="{{ route('profile.update') }}">
                @csrf
                <div class="mb-3">
                    <label for="image" class="form-label">Image Link</label>
                    <input value="{{ old('image') ?? $user->image }}"
                        type="text" 
                        class="form-control" 
                        name="image" 
                        placeholder="Image Link" required>
                    @if ($errors->has('image'))
                        <span class="text-danger text-left">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">phone</label>
                    <input value="{{ old('phone') ?? $user->phone }}"
                        type="text" 
                        class="form-control" 
                        name="phone" 
                        placeholder="Phone Number" required>
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
                        placeholder="Address" required>
                    @if ($errors->has('address'))
                        <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                    @endif
                </div>
                

                <button type="submit" class="btn btn-primary">Update profile</button>
                <a href="{{ route('profile.index') }}" class="btn btn-default">Cancel</button>
            </form>
        </div>

    </div>
@endsection