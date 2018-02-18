@extends('layouts.new_master')
@section('header')
<style type="text/css">
.required label {
    font-weight: bold;
}
.required label:after {
    color: #e32;
    content: ' *';
    display:inline;
}
</style>
@endsection

@section('content')
<section id="fh5co-explore" data-section="">
        <div class="fh5co-explore fh5co-explore-bg-color">
            <div class="container">
                        <div class="container">
                        <div class="list-item  center-block" style="max-width: 1000px;align-content: center; margin: 0 auto;">
                            <div class="row">
                                <br>
                                <h3 class="text-center">{{Auth::user()->company->name}}</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="add_image">
                                            <img src="{{Auth::user()->company->logo}}" alt="Avatar" class="img-responsive center-block" style="width: 200px">
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-4">
                                        <form method="post" enctype="multipart/form-data" action="{{ route('company.postAddVacancy') }}">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4" style="text-align: left"> Job Title <span style="color:red;">*</span></div>
                                            <div class="col-lg-8 col-md-8">  <input class="login-inbox center-block" type="text"  style="width: 95%; color:black;" placeholder="SE" name="job_title" value="{{ old('job_title') }}">
                                            @if ($errors->has('job_title'))
                                                <span style="color: red;font-size: 0.7em;text-align: center;">
                                            <strong>{{ $errors->first('job_title') }}</strong>
                                                </span>
                                            @endif
                                                </div>
                                        </div>
                                        
                                        <div class="row">
                                            <br>
                                            <div class="col-lg-4 col-md-4" style="text-align: left"> Responsibility<span style="color:red;">*</span></div>
                                            <div class="col-lg-8 col-md-8"> <textarea rows="5" class="login-inbox center-block" style="width: 95%; color:black;" placeholder="you have 10 - 500 characters to tell about job responsibility" name="responsibility">{{ old('responsibility') }}</textarea> 
                                                @if ($errors->has('responsibility'))
                                                <span style="color: red;font-size: 0.7em;text-align: center;">
                                                    <strong>{{ $errors->first('responsibility') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <br>
                                            <div class="col-lg-4 col-md-4" style="text-align: left">  Required Technologies<span style="color:red;">*</span></div>
                                            <div class="col-lg-8 col-md-8"> <textarea rows="2" class="login-inbox center-block" style="width: 95%; color:black;" placeholder="Java,C#.Net,JavaScript," name="technologies">{{ old('technologies') }}</textarea>
                                                @if ($errors->has('technologies'))
                                                <span style="color: red;font-size: 0.7em;text-align: center;">
                                                    <strong>{{$errors->first('technologies')}}</strong>
                                                </span>
                                                @endif
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4" style="text-align: left"> Salary</div>
                                            <div class="col-lg-8 col-md-8">  <input class="login-inbox center-block" type="text" placeholder="60000" style="width: 95%; color:black;"  name="salary" value="{{ old('salary') }}">
                                            </div>
                                        </div>
                                        <br>

                                        <br>
                                        <button class="login-btn center-block">Add</button>
                                        <input type="hidden" name="_token" value="{{Session::token()}}">
                                        <hr>
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