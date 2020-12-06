<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title','Laravel Blog Website') | Laravel Blog Website </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('frontend')}}/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('frontend')}}/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/fontastic.css">
    <!-- Google fonts - Open Sans-->

    <link rel="stylesheet" href="{{asset('frontend')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/animate.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <!-- Fancybox-->
    <link rel="stylesheet" href="{{asset('frontend')}}/vendor/@fancyapps/fancybox/jquery.fancybox.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('frontend')}}/favicon.png">

</head>
<body>
1<header class="header">
    <!-- Main Navbar-->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="search-area">
            <div class="search-area-inner d-flex align-items-center justify-content-center">
                <div class="close-btn"><i class="icon-close"></i></div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                        <form action="#">
                            <div class="form-group">
                                <input type="search" name="search" id="search" placeholder="What are you looking for?">
                                <button type="submit" class="submit"><i class="icon-search-1"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- Navbar Brand -->
            <div class="navbar-header d-flex align-items-center justify-content-between">
                <!-- Navbar Brand --><a href="{{route('home')}}" class="navbar-brand"><img src="{{asset($site->logo)}}" alt=""
                                                                                           class="img-fluid"></a>
                <!-- Toggle Button-->
                <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
            </div>
            <!-- Navbar Menu -->
            <div id="navbarcollapse" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="{{route('home')}}" class="nav-link active ">Home</a>
                    </li>
                    <li class="nav-item"><a href="{{route('blog')}}" class="nav-link ">Blog</a>
                    </li>
                    <li class="nav-item"><a href="{{route('contact')}}" class="nav-link ">Contact</a>
                    </li>
                    @if(Auth::guard('user')->check())
                    <li class="nav-item"><a href="{{route('users.profile')}}" class="nav-link ">Profile</a>
                    </li>
                        @endif

                </ul>
                <div class="navbar-text"><a href="#" class="search-btn"><i class="icon-search-1"></i></a></div>
                <ul class="langs navbar-text">
                    @guest('user')
                    <a href="{{route('users.login')}}" class="active">Login</a>
                    <a href="{{route('users.registration')}}">Register</a>
                    @endguest
                    @if(Auth::guard('user')->check())
                        <a class="dropdown-item" href="{{ route('user.logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="container-fluid">
    @if(session('front_message'))
        <div class=" mt-5 pt-5 alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
            {{ session('front_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>