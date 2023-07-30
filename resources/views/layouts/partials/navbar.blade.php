<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">

    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @media screen and (max-width: 720px) {
          .hide-on-small {
            display: none;
          }
        }
    </style>
</head>
<body>
    <nav>
        <div class="nav-bar">
            <i class='bx bx-menu sidebarOpen' ></i>
            <span class="logo navLogo hide-on-small"><a href="#"><img src="{{URL::asset('images/logo.png')}}" alt="logo" height="auto" width="185px"></a></span>

            <div class="menu">
                <div class="logo-toggle">
                    <span class="logo"><a href="{{ route('home.index') }}"><a href="#"><img src="{{URL::asset('images/logo.png')}}" alt="logo" height="auto" width="185px"></a></a></span>
                    <i class='bx bx-x siderbarClose'></i>
                </div>

                <ul class="nav-links">
                    <li><a href="{{ route('home.index') }}">Home</a></li>
                    <li><a href="{{ route('photo.index') }}">Photo</a></li>
                    <li><a href="{{ route('place.index') }}">Place</a></li>

                    @auth
                        @role('admin')
                            <li><a href="{{ route('dashboard.index') }}">Dashboad</a></li>
                        @endrole
                        @role('stuff')
                            <li><a href="{{ route('users.index') }}">Users</a></li>
                            <li><a href="{{ route('places.index') }}">Places</a></li>
                            <li><a href="{{ route('posts.index') }}">Posts</a></li>
                        @endrole


                    @endauth
                </ul>
            </div>

            <div class="darkLight-searchBox">
                <div class="dark-light">
                    <i class='bx bx-moon moon'></i>
                    <i class='bx bx-sun sun'></i>
                </div>

                <div class="searchBox">
                   <div class="searchToggle">
                        <i class='bx bx-x cancel'></i>
                        <i class='bx bx-search search'></i>
                   </div>
                    {{-- <div class="search-field">
                        <input type="text" placeholder="Search...">
                        
                    </div> --}}
                    <form class="search-field" action="{{ route('search.index') }}" method="GET">
                        <input type="text" name="search" placeholder="Search" value="{{ old('search') }}">
                        <button type="submit" class='bx bx-search btn' style="width: 50px; height: 40px"></button>
                    </form>
                </div>

                @auth
                    <div style="margin-left: 10px;" class="dropdown">
                        <button src="https://images.pexels.com/photos/15767257/pexels-photo-15767257.jpeg?cs=srgb&dl=pexels-thamyres-silva-15767257.jpg&fm=jpg&_gl=1*gt2tmu*_ga*MTMxMjgzNTE2NC4xNjg5Mzg4NjIx*_ga_8JE65Q40S6*MTY4OTg0NTYzNS41LjEuMTY4OTg0Njk2NS4wLjAuMA.."
                        class=" btn btn-info dropdown-toggle" type="profile" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="true">
                        Upload
                        </button>
                    

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{ route('uploadphoto.create') }}" >Upload photo</a></li>
                            <li><a class="dropdown-item" href="{{ route('uploadplace.create') }}" >Upload place</a></li>
                        </ul>
                    </div>
                @endauth
                @auth
                    <div style="margin-left: 10px;" class="dropdown">
                        <img class="userImage" src="{{ auth()->user()->image }}" alt="avatar"
                        class="dropdown-toggle" type="profile" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="true">

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{ route('profile.index') }}" >Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a></li>
                            {{-- <li><a class="dropdown-item" href="#">Forgot Password</a></li> --}}
                            <li><a class="dropdown-item" href="{{ route('logout.perform') }}" >Logout</a></li>
                        </ul>
                    </div>
                @endauth

                @guest
                    <div>
                        <a href="{{ route('login.perform') }}" type="button" class="btn btn-outline-success">Login</a>
                    </div>
                    <div style="margin-left: 10px;">
                        <a href="{{ route('register.perform') }}" type="button" class="btn btn-outline-info">Sign Up</a>
                    </div>
                @endguest
            </div>

        </div>
    </nav>
    <script type="text/javascript" src="{{ asset('assets/js/navbar.js') }}"></script>
    
</body>
</html>
