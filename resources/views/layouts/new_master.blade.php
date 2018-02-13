<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'FIT-Career Fair 2018') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="FIT Careers 2018" />
    <meta name="keywords" content="Fit, Careers, IT, Information Technology, IT, jobs, career" />
    <meta name="author" content="INTECS" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico"> 

    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="{{asset('css_new/animate.css')}}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{asset('css_new/icomoon.css')}}">
    <!-- Simple Line Icons -->
    <link rel="stylesheet" href="{{asset('css_new/simple-line-icons.css')}}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{asset('css_new/bootstrap.css')}}">
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{asset('css_new/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css_new/owl.theme.default.min.css')}}">
    <!-- Style -->

    <link rel="stylesheet" href="{{asset('css_new/style.css')}}">
    @yield('header')
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>    

    <!-- Modernizr JS -->
    <script src="{{asset('js_new/modernizr-2.6.2.min.js')}}"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
    <body>
    <header role="banner" id="fh5co-header">
        <div class="fluid-container" >
            <nav class="navbar navbar-default navbar-fixed-top" style="height: 110px; opacity: 0.9;border-bottom: solid #66a0ff">
                <div class="navbar-header">
                    <!-- Mobile Toggle Menu Button -->
                    <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
                    <a class="navbar-brand" href="{{route('root')}}"><img src="{{ url('/images_2018/logo.png') }}" width="200px" alt=""></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <div class="nav navbar-nav navbar-right hidden-xs" style="font-size: 0.7em; border-bottom: 1px solid black;margin-top: 5px"><a style="text-decoration: none; color: grey"
                        href="https://www.mrt.ac.lk/web/itfac" class="external">Faculty of Information Technology - University of Moratuwa</a></div>
                    <br>
                    <ul class="nav navbar-nav navbar-left">

                        <li class="{{ Route::is('root') ? 'active' : '' }}"><a href="{{ Route::is('root') ? '#' : '/careers/' }}" data-nav-section="home"
                            class="{{Route::is('root') ? '' : 'external' }}"><span>Home</span></a></li>
                        @if(Route::is('root'))    
                        <li><a href="" data-nav-section="explore" ><span>About us</span></a></li>
                        <!-- <li><a href="" data-nav-section="social" ><span>Social</span></a></li> -->
                        <li><a href="" data-nav-section="talents" ><span>Talents</span></a></li>
                        <!-- <li><a href="" data-nav-section="sponsors"><span>Sponsors</span></a></li> -->
                        @endif
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('students') }}" data-nav-section="{{ !Route::is('root') ? 'explore' : '' }}" class="external"><span>Students</span></a></li>
                        <li><a href="{{ route('companies') }}" data-nav-section="companies" class="external"><span>Companies</span></a></li>
                        @if(Auth::guest())
                        <li class="call-to-action"><a href="{{route('login')}}" class="external"><span>Login</span></a></li>
                        @elseif(Auth::user()->role=='company')
                        <li>
                            <div class="dropdown" style="margin-top: 15px">
                                <span class=dropdown-toggle" type="button" data-toggle="dropdown" style="text-decoration: none;"><p class="user_name">{{Auth::user()->company->name}}
                                    <span class="caret"></span>
                                </p>
                                </span>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('home')}}" class="external">Dashboard</a></li>
                                    <li><a href="{{route('get_change_company_password')}}" class="external">Reset Password</a></li>
                                    <li><a href="{{route('logout')}}" class="external">Logout</a></li>
                                </ul>
                            </div>
                        </li>
                        @else
                        <li class="call-to-action"><a href="{{route('home')}}" class="external"><span>Dashboard</span></a></li>
                        @endif
                    </ul>
                </div>
            </nav>
      </div>
    </header>


        @yield('content')
        <div id="fh5co-footer" role="contentinfo">
        <div class="container">
            <div class="row">
                <div class="to-animate">
                    <div class="row">
                        <div class="col-lg-3"><i class="icon-map-marker"></i> INTCS, Faculty of Information Technology, University of Moratuwa, Katubedds, Sri Lanka</div>
                        <div class="col-lg-3"><i class="icon-phone"></i> + 94 71 123 4587</div>
                        <div class="col-lg-3"><i class="icon-envelope"></i><a href="#"> info@intecs.mrt.ac.lk</a></div>
                        <div class="col-lg-3"><i class="icon-globe2"></i><a href="#"> www.intecs.itfac.mrt.ac.lk/careers</a></div>
                    </div>
                    <ul class="social-media pull-right">
                        <li><a href="#" class="facebook"><i class="icon-facebook"></i></a></li>
                        <li><a href="#" class="twitter"><i class="icon-twitter"></i></a></li>
                        <li><a href="#" class="dribbble"><i class="icon-dribbble"></i></a></li>
                        <li><a href="#" class="github"><i class="icon-github-alt"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <!-- Scripts -->
    <!-- jQuery -->
    <script src="/js_new/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="/js_new/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="/js_new/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="/js_new/jquery.waypoints.min.js"></script>
    <!-- Stellar Parallax -->
    <script src="/js_new/jquery.stellar.min.js"></script>
    <!-- Owl Carousel -->
    <script src="/js_new/owl.carousel.min.js"></script>
    <!-- Main JS (Do not remove) -->
    <script src="/js_new/main.js"></script>
    @yield('scr')

</body>
</html>
