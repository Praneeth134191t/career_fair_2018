@extends('layouts.new_master')

@section('content')
    <section id="fh5co-explore" data-section="">
        <div class="fh5co-explore fh5co-explore-bg-color">
            <div class="container">
                        <div class="container">
                        <div class="list-item center-block" style="max-width: 500px;align-content: center; margin: 0 auto;">
                            <div class="row">
                                <br>
                                <h3 class="text-center"> Login</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4"><img class="img-circle img-responsive center-block" src="{{ url('/images_2018/login.png') }}" alt="" style="max-width: 60%"> <br></div>
                                    <div class="col-lg-7">
                                        <form class="form-horizontal" role="form" method="post" action="{{ route('login') }}">
                                            <fieldset>
                                            {{ csrf_field() }}   
                                                    <input class="login-inbox center-block" style="max-width: 90%" name="name" type="text" placeholder="User Name" value="{{ old('name') }}" required >
                                                
                                                <br>
                                               
                                                    <input class="login-inbox center-block" name="password" type="password" placeholder="Password" style="max-width: 90%" required>
                                                
                                                    @if ($errors->has('password') || $errors->has('name'))
                                                        <span style="color: red;font-size: 0.7em;text-align: center;">
                                                        These credentials do not match our records.
                                                        </span>
                                                    @endif
                                                <br>    
                                                <button class="login-btn center-block">Login</button>
                                            </fieldset>
                                        </form>        
                                    </div>
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
