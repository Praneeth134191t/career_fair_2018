@extends('layouts.master')

@section('content')
<div class="container" style="margin-top: 72px">
    <div class="row login">
        <div class="well well-lg col-lg-5 col-lg-offset-1">
            <form class="form-horizontal" role="form" method="post" action="{{ route('login') }}">
                <fieldset>
                    {{ csrf_field() }}
                    <legend><i class="fa fa-2x fa-graduation-cap"></i>Students Sign in</legend>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="inputEmail" class="col-md-4 control-label">Index No</label>

                        <div class="col-md-8">
                            <input id="name" type="text" autocomplete="off" placeholder="ex: 124000h" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="inputPassword" class="col-md-4 control-label">Password</label>

                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 0;"> <!-- inline style is just to demo custom css to put checkbox below input above -->
                        <div class="col-md-offset-2 col-md-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-2">
                            <a type="button" href="{{route('root')}}" style="width: 45%" class="btn btn-raised btn-default">Cancel</a>
                            <button type="submit" style="width: 45%; float: right" class="btn btn-raised btn-primary">Login</button>
                            <a href="redirect/twitter" style="width: 100%; background-color: #1da1f2" class="btn btn-raised btn-lg"><i class="fa fa-twitter"></i> Sign in with Twitter</a>
                        </div>
                        <div class="col-md-10">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="well well-lg col-lg-4 col-lg-offset-1">
            <form class="form-horizontal" role="form" method="post" action="{{ route('login') }}">
                <fieldset>
                    <legend><i class="fa fa-2x fa-graduation-cap"></i>Students Sign up</legend>
                    <div class="form-group">
                        <div class="col-lg-12 text-justify">
                            <strong>Attention plz !</strong>
                            Sign up is only allowed for the batch tweet followers,
                            use the twitter account which you get batch tweets
                        </div>
                        <div class="col-lg-6 col-lg-offset-3">
                            <a href="redirect/twitter" style="width: 100%; background-color: #1da1f2" class="btn btn-raised btn-lg"><i class="fa fa-twitter"></i> Sign up</a>
                        </div>
                        @if (session('status'))
                            <div class="col-lg-12">
                                <p class="text-warning text-center"><b>{{ session('status') }}</b></p>
                            </div>
                        @endif
                    </div>
                </fieldset>
            </form>
        </div>
    </div>


</div>
@endsection
@section('scripts')
    @parent

@endsection
