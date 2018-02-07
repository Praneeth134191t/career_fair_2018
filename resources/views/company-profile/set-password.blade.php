@extends('layouts.new_master')
@section('header')

@endsection

@section('content')
    <section id="fh5co-explore" data-section="">
        <div class="fh5co-explore fh5co-explore-bg-color">
            <div class="container to-animate">
                        <div class="container">
                        <div class="list-item to-animate center-block" style="max-width: 1000px;align-content: center; margin: 0 auto;">
                            <div class="row">
                                <br>
                                <h3 class="text-center">Change password {{Auth::user()->stats=='first_time'?'before continue':''}}</h3>
                                <hr>
                                        <div class="col-md-8 col-md-offset-2">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('set_company_password') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset
                                </button>
                            </div>
                        </div>
                    </form>
        </div>

                            </div>


                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

 
@endsection
@section('scr')

@endsection
