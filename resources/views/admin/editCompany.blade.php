@extends('layouts.app')

@section('header')
    <style>
        .navbar{
            margin-bottom: -1px!important;
        }
    </style>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap-tokenfield.css') }}">
    <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
    <link rel="stylesheet" href="{{ URL::to('css/main.css') }}">



@section('content')
<div id="wrapper">
        <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li>
                <a href="{{route('admin.companiesPage')}}">Add Companies</a>
            </li>
            <li>
                <a href="{{route('admin.studentsPage')}}">Add Users manually</a>
            </li>
            <li>
                <a href="{{ route('logout') }}">Logout</a>
            </li>
        </ul>
    </div>

    <div class="container"  id="page-content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <form method="post" enctype="multipart/form-data" action="{{route('admin.editCompany',[$company->id])}}">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name">Company Name</label>
                    <input class="form-control" id="name" rows="3" placeholder="Company Name" name="name" value="{{ old('name',$company->name) }}">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    </div>     
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" rows="3" placeholder="you have 50 - 500 characters to tell about you " name="description">{{ old('description',$company->description) }}</textarea>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                    <label for="logo">Logo (Max : 3MB)</label>
                    <input data-preview="#preview" name="input_img" type="file" id="imageInput" class="center-block" style="font-size: 0.8em" value="{{ old('input_img') }}">
                    @if ($errors->has('input_img'))
                        <span class="help-block">
                            <strong>{{ $errors->first('input_img') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                    <label for="website">Website</label>
                    <input class="form-control" id="website" rows="3" placeholder="Web Site" name="website" value="{{ old('website',$company->website) }}">
                    @if ($errors->has('website'))
                        <span class="help-block">
                            <strong>{{ $errors->first('website') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('sponsership_type') ? ' has-error' : '' }}">
                    <label for="sponsership_type">Sponsership type</label>
                    @if(!is_null($company->sponsership_type))
                    <input class="form-control" id="sponsership_type" rows="3" placeholder="Web Site" name="sponsership_type" value="{{ old('sponsership_type',$company->sponsership_type) }}">
                    @else
                    <input class="form-control" id="sponsership_type" rows="3" placeholder="Web Site" name="sponsership_type" value="{{ old('sponsership_type','None') }}">
                    @endif

                </div>
                    <div class="col-md-offset-11">
                <button type="submit" class="btn btn-primary">Submit</button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </div>

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