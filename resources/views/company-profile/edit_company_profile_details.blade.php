@extends('layouts.new_master')

@section('header')

@endsection

@section('content')
<section id="fh5co-explore" data-section="">
        <div class="fh5co-explore fh5co-explore-bg-color">
            @if (session()->has('pw_succss'))
                                <h3 class="text-center" style="color: green">Password has been changed successfully</h3>
            @endif
            <div class="container to-animate">
                        <div class="container">
                        <div class="list-item to-animate center-block" style="max-width: 1000px;align-content: center; margin: 0 auto;">
                            <div class="row">
                                <br>
                                <h3 class="text-center"> {{$company->name}}</h3>
                                <hr>
                                <div class="row">

                                    <form method="post" enctype="multipart/form-data" action="{{ route('company.post_edit_details') }}">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="add_image">
                                            <img src="{{$company->logo}}" alt="company_logo" class="hvrbox-layer_bottom center-block" style="width: 200px">
                                            <label for="imageInput">Change Image</label>
                                            <input data-preview="#preview" name="input_img" type="file" id="imageInput" class="center-block" style="font-size: 0.8em" value="{{ old('input_img') }}">
                                        </div>
                                        <span style="color: black;font-size: 0.7em;text-align: center;">
                                                <strong>(Image size should be small than 3MB)</strong>
                                                </span>
                                        <br>
                                        @if ($errors->has('input_img'))
                                                <span style="color: red;font-size: 0.7em;text-align: center;">
                                                <strong>{{ $errors->first('input_img') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-4">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4" style="text-align: center"> Company Name<span style="color:red;">*</span></div>
                                            <div class="col-lg-8 col-md-8">  <input class="login-inbox center-block" type="text" placeholder="Company Name" style="width: 95%; color: black" name="name" value="{{ old('name',$company->name) }}">
                                            @if ($errors->has('name'))
                                                <span style="color: red;font-size: 0.7em;text-align: center;">
                                                <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif    
                                            </div>
                                        </div>
                                        <div class="row">
                                            <br>
                                            <div class="col-lg-4 col-md-4" style="text-align: center"> Company Description<span style="color:red;">*</span></div>
                                            <div class="col-lg-8 col-md-8"> <textarea rows="5" id="description" style="width: 95%; color: black" class="login-inbox center-block" name="description" placeholder="you have 50 - 500 characters to tell about company">{{ old('description',$company->description) }}</textarea> 
                                            @if ($errors->has('description'))
                                                <span style="color: red;font-size: 0.7em;text-align: center;">
                                                <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                            </div>
                                        </div>
                                        <br>
                                        <button class="login-btn center-block">Update {{$company->status=='deactive'?'& Activate':''}}</button>
                                        <input type="hidden" name="_token" value="{{Session::token()}}">
                                        <hr>
                                    
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