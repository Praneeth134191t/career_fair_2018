<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FIT-Career Fair 2017') }}</title>
    <link rel="shortcut icon" href="/intecs-images/logo2.png" type="image/x-icon">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('image-picker/image-picker.css') }}" rel="stylesheet">
    @yield('header')
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="pattern-bg">

    <div id="grad">
        <nav class="navbar navbar-default navbar-static-top" style="background-color: #333333;">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="" href="{{ route('root') }}">
                        <img style="display: inline;" src="{{ url('/img/mora_logo.png') }}" class="">
                        <div class="" style="display: inline-block; color: #ffffff"> {{ config('app.name', 'FIT-Career Fair 2017') }} </div>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                            @if(!(Auth::user()->role == 'admin'))
                                
                                @if(\Illuminate\Support\Facades\Auth::user()->profile)
                                        <li><a href="{{route('getEditProfileDetails')}}" class="asd" style="color: #ffffff">Edit Details</a>
                                        </li>
                                        <li><a href="{{route('getChangeProfilePassword')}}" class="asd" style="color: #ffffff">Change Password</a>
                                        </li>     
                                @endif
                                @if(\Illuminate\Support\Facades\Auth::user()->company)
                                        <li>
                                            <a href="{{route('company.edit_details')}}" class="asd" style="color: #ffffff">Edit Details</a>
                                        </li>
                                        <li>
                                            <a href="{{route('company.getAddVacancies')}}" class="asd" style="color: #ffffff">Add New Vacancies</a>
                                        </li>
                                @endif
                            @endif
                            <li>
                                <a href="{{ route('root') }}" class="asd" style="color: #ffffff">Home</a>
                            </li>
                            @if(Auth::user()->role != 'admin')
                            <li>
                                <a href="{{ route('logout') }}" class="asd" style="color: #ffffff">Logout</a>
                            </li>    
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="{{ URL::to('js/main.js') }}"></script>
</body>
</html>
