@extends('layouts.app-master')


@section('content')

    <br><br><br>
    <div class="bg-light p-5 rounded">
        <h1>Dashboard</h1>
        <div class="lead">
            <p>Welcome to the dashboard, {{ Auth::user()->name }}!</p>
        </div>
    </div>
    <ul class="nav nav-pills nav-stacked" id="sidebar">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('roles.index') }}">
                <i class="fa fa-dashboard"></i>
                User Role
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/users">
                <i class="fa fa-users"></i>
                Users
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/posts">
                <i class="fa fa-file"></i>
                Posts
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/comments">
                <i class="fa fa-comments"></i>
                Comments
            </a>
        </li>
    </ul>
@endsection
