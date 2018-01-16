<?
use \Illuminate\Routing;
?>
<div class="container">
<h1 class="header" style="margin-top: 5px">
    <img style="display: inline; height: 72px" src="/img/cflogo.png" class="img-responsive">
    <style>
        .navbar-toggle.navbar-left {
            float: left;
            margin-left: 10px;
        }
        .navbar-header .form-group{
            padding-bottom: 0;
            margin: -16px 0 -16px 0;
            display: inline;

        }
        .navbar-header .form-group .form-control{
            display: inline;
            width: 80%;
            height: 17px;
            color: #fdcc52;
        }

    </style>
</h1>
</div>

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <div class="navbar-toggle navbar-left collapsed visible-xs-block visible-sm-block" style="width: 70%; display: inline;{{ !Route::is('students') ? "display:none": ''}}">
                        <input type="text" value="{{app('request')->input('q')}}" id="q" class="form-control query" placeholder="Search">
                        <img class="searching_ico" style="display: none" src="/img/ajaxloading.gif" width="30px">
            </div>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ Route::is('root') ? 'active' : '' }}"><a href="{{Route::is('root') ? '#home' : '/careers' }}">Home</a></li>
                <li {{ !Route::is('root') ? "style=display:none": ""}}>
                    <a class="page-scroll" href="#itfac">About ITFac</a>
                </li>
                <li {{ !Route::is('root') ? "style=display:none": ""}}>
                    <a class="page-scroll" href="#sponsors">Career Fair Sponsors</a>
                </li>
                </li>
            </ul>
            <div class="navbar-form navbar-left hidden-sm hidden-xs" {{ !Route::is('students') ? "style=display:none": ""}}>
                <div class="row">
                    <div class="col-lg-12">
                        <i class="fa fa-search"></i>
                        <input type="text" value="{{app('request')->input('q')}}" id="q" style="width:30vw;" class="form-control col-sm-8 query" placeholder="Search">
                        <img class="searching_ico" style="display: none" src="/img/ajaxloading.gif" width="30px">
                    </div>
                </div>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="{{ Route::is('companies') ? 'active' : '' }}"><a href="{{route('companies')}}">Companies</a></li>
                <li class="{{ Route::is('students') ? 'active' : '' }}"><a href="{{route('students')}}">Students</a></li>
                @if (Route::has('login'))

                    @if (Auth::check())
                        <li class="{{ Route::is('home') ? 'active' : '' }}"><a href="{{route('home')}}"><i class="fa fa-graduation-cap"></i> Dashboard</a></li>
                    @else
                        <li class="{{ Route::is('login') ? 'active' : '' }}"><a href="{{ route('login') }}"><i class="fa fa-graduation-cap"></i> Login</a></li>
                    @endif

                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

