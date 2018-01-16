@extends('layouts.app')

@section('header')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap-tokenfield.css') }}">
    <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
    <link rel="stylesheet" href="{{ URL::to('css/main.css') }}">

@endsection

@section('content')
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">My Profile Settings</h3>
                </div>
                <div class="panel-body">
                <form method="post" enctype="multipart/form-data" action="{{ route('postProfileDetails') }}">

                    <div class="form-group">
                        <label for="firstName"><a type="button" target="_blank" href="https://script.google.com/macros/s/AKfycbwm7YdFs-y5_MiPoeZcnUumQvcMh5VRPSdWFtk1CxJ7zq5TWQfH/exec" class="btn btn-default">Upload your CV</a></label>
                        <div>
                            @if(isset($_GET['link']))
                                <a type="button" target="_blank" href="{{$_GET['link']}}">CV Link</a>
                                <input type="text" readonly class="form-control" id="cv_link" value="{{ old('cv_link',$_GET['link']) }}" name="cv_link">
                            @else
                                <h5 style="color: #aa0645">Your cv link is not set, Please upload your cv to drive..</h5>
                            @endif
                        </div>
                    </div>

                    @if(!isset($_GET['link']))
                        for continue please upload ur cv first
                    @endif

                    @if(isset($_GET['link']))

                    <div class="col-md-2 selected_img">
                        <img src="/profilepics/{{old('profile_img',$thumbs[0])}}" alt="">
                    </div>

                    <div class="form-group col-md-10">
                        <label for="firstName">Select your profile picture</label>

                        <select id="select_profile_pic" class="image-picker show-html" name="profile_img">
                            @foreach($thumbs as $thumb)


                                @if(old('profile_img') == $thumb)
                                    <img src="/profilepics/{{$thumb}}" alt="">
                                    <option data-img-src="/profilepics/{{$thumb}}" selected data-img-alt="{{$thumb}}" value="{{$thumb}}">{{$thumb}}</option>
                                @else
                                    <img src="/profilepics/{{$thumb}}" alt="">
                                    <option data-img-src="/profilepics/{{$thumb}}" data-img-alt="{{$thumb}}" value="{{$thumb}}">{{$thumb}}</option>
                                @endif
                            @endforeach
                        </select>

                        <small id="emailHelp" class="form-text text-muted">Please select your one.</small>
                    </div>

                    <div class="form-group{{ $errors->has('job_status') ? ' has-error' : '' }}">
                        <label for="exampleSelect1">Are you available or hired ?</label>
                        <select class="form-control" id="job_status" name="job_status">
                            <option {{old('job_status')=="available"? 'selected':''}}  value="available">Available</option>
                            <option {{old('job_status')=="hired"? 'selected':''}} value="hired">Hired</option>
                        </select>
                        @if ($errors->has('job_status'))
                            <span class="help-block">
                        <strong>{{ $errors->first('job_status') }}</strong>
                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName" aria-describedby="emailHelp" placeholder="Enter First Name" value="{{ old('firstName') }}" name="firstName">
                        @if ($errors->has('firstName'))
                            <span class="help-block">
                                <strong>{{ $errors->first('firstName') }}</strong>
                            </span>
                        @endif
                        <small id="emailHelp" class="form-text text-muted">Your first name will be shared publicly.</small>
                    </div>

                    <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('lastName') }}" name="lastName">
                        @if ($errors->has('lastName'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lastName') }}</strong>
                            </span>
                        @endif
                        <small id="emailHelp" class="form-text text-muted">Your last name will be shared publicly</small>
                    </div>

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phoneNo">Phone NO.</label>
                        <input type="text" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Enter Phone Number" value="{{ old('phone') }}" name="phone">
                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                        <small id="emailHelp" class="form-text text-muted">phone number will be shared publicly</small>
                    </div>

                    <div class="form-group{{ $errors->has('linkedin') ? ' has-error' : '' }}">
                        <label for="linkedinLink">LinkedIn</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Link" value="{{ old('linkedin') }}" name="linkedin">
                        @if ($errors->has('linkedin'))
                            <span class="help-block">
                                <strong>{{ $errors->first('linkedin') }}</strong>
                            </span>
                        @endif
                        <small id="emailHelp" class="form-text text-muted">Link will be shared publicly</small>
                    </div>
                <div class="form-group{{ $errors->has('degree') ? ' has-error' : '' }}">
                    <label for="exampleSelect1">Degree</label>
                    <select class="form-control" id="exampleSelect1" value="{{ old('degree') }}" name="degree">
                        <option value="IT">BSc(Hons) IT</option>
                        <option value="ITM">BSc(Hons) ITM</option>
                    </select>
                    @if ($errors->has('degree'))
                        <span class="help-block">
                            <strong>{{ $errors->first('degree') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('objective') ? ' has-error' : '' }}">
                    <label for="objective">Profile/Objective</label>
                    <textarea class="form-control" id="objective" rows="3" placeholder="you have 50 - 500 characters to tell about you " value="{{ old('objective') }}" name="objective">{{ old('objective') }}</textarea>
                    @if ($errors->has('objective'))
                        <span class="help-block">
                            <strong>{{ $errors->first('objective') }}</strong>
                        </span>
                    @endif
                </div>
                    <div class="form-group{{ $errors->has('techskills') ? ' has-error' : '' }}">
                        <label for="techskills">Technical Skills</label>
                        {{--<textarea class="form-control" id="techskills" rows="3" name="techskills"></textarea>--}}
                        <input type="text" class="form-control" placeholder="select or type: Java, PHP, etc..." id="tokenfield" name="techskills" value="{{ old('techskills') }}"/>
                        @if ($errors->has('techskills'))
                            <span class="help-block">
                                <strong>{{ $errors->first('techskills') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-md-offset-11">
                <button type="submit" class="btn btn-primary">Submit</button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </div>
                @endif

                </form>

                </div>
            </div>
        </div>
    </div>


    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="{{ URL::to('js/bootstrap-tokenfield.js') }}"></script>
    <script src="{{ asset('image-picker/image-picker.js') }}"></script>

    <script>
        $("#select_profile_pic").imagepicker({selected: function(){
            var sel = $('.selected>img').attr('src');
            $('.selected_img>img').attr('src',sel);
        }});

        $('#tokenfield').tokenfield({
            autocomplete: {
                source: ['Java', 'C#.NET', 'Python', 'Laravel', 'Spring'],
                delay: 100
            },
            showAutocompleteOnFocus: true
        })
    </script>
@endsection