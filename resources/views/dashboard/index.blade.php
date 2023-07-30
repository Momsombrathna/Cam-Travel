@extends('layouts.app-master')


@section('content')

    <br><br><br>
    <div class="bg-light p-5 rounded">
        <h1>Dashboard</h1>
        <div class="lead">
            <p>Welcome to the dashboard, {{ Auth::user()->name }}!</p>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Totals</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>

                    <td>Users Count</td>
                    <td>{{ $user_count }}</td>
     
                  </tr>
                  <tr>
                
                    <td>Posts Count</td>
                    <td>{{ $post_count }}</td>
                  
                  </tr>
                  <tr>
                
                    <td>Places Count</td>
                    <td>{{ $place_count }}</td>
                  
                  </tr>
                  <tr>
                   
                    <td>Roles Count</td>
                    <td>{{ $role_count }}</td>
                  </tr>
                  <tr>
                   
                    <td>permission Count</td>
                    <td>{{ $permission_count }}</td>
                  </tr>
                </tbody>
              </table>
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
                    <a class="nav-link" href="/places">
                        <i class="fa fa-comments"></i>
                        Places
                    </a>
                </li>
            </ul>
        </div>
    </div>
    
@endsection
