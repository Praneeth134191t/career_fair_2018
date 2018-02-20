@extends('layouts.app')

@section('header')
    <style>
        .navbar{
            margin-bottom: -1px!important;
        }
    </style>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


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
    <!-- /#sidebar-wrapper -->

    <div class="modal fade" id="add-companies">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    				<h4 class="modal-title">Add Company</h4>
    			</div>
    			<div class="modal-body">
    				
                    <form enctype="multipart/form-data" action="{{route('admin.addNewCompany')}}" method="post" role="form">
                        {{ csrf_field() }}
                    	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    		<label for="">Company name</label>
                    		<input type="text" class="form-control" name="name" id="name" placeholder="Google Inc." value="{{old('name')}}">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                    	</div>

                        <div class="form-group{{ $errors->has('user_name') ? ' has-error' : '' }}">
                            <label for="">User Name</label>
                            <input type="text" class="form-control" name="user_name" id="user_name" placeholder="google_inc" value="{{old('user_name')}}">
                            @if ($errors->has('user_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('user_name') }}</strong>
                                </span>
                            @endif                            
                        </div>
                        
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif                            
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="email" value="{{old('email')}}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif                            
                        </div>

                        <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                            <label for="">Website</label>
                            <input type="text" class="form-control" name="website" id="website" placeholder="https://google.com" value="{{old('website')}}" >
                            @if ($errors->has('website'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('website') }}</strong>
                                </span>
                            @endif                            
                        </div>

                        <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                            <label for="">Logo image (Max Size: 3MB)</label>
                            <input data-preview="#preview" name="input_img" type="file" id="imageInput" class="center-block" style="font-size: 0.8em" value="{{ old('input_img') }}">
                    
                            @if ($errors->has('input_img'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('input_img') }}</strong>
                                </span>
                            @endif                            
                        </div>
                        <div class="form-group{{ $errors->has('sponsership_type') ? ' has-error' : '' }}">
                            <label for="">Sponsership Type</label>
                            <select class="form-control" id="sponsership_type" name="sponsership_type">
                                <option value="None">None</option>
                                <option  value="Strategic">Strategic Sponser</option>
                                <option  value="Platinum">Platinum Sponser</option>
                                <option  value="Gold">Gold Sponser</option>
                                <option  value="Silver">Silber Sponser</option>
                                <option  value="Co-Sponser">Co-Sponser</option>
                            </select>                           
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="">Description</label>
                            <textarea class="form-control" name="description" placeholder="Description" style="width: 100%" value="{{old('description')}}"></textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif                            
                        </div>

                        <input type="submit" style="display:none" />
                    	<button type="submit" class="btn btn-success">Save</button>
                    </form>

    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    			</div>
    		</div><!-- /.modal-content -->
    	</div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="container"  id="page-content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <span class="companies-pag">{{$companies->links()}}</span>
                <button style="float: right"  data-target="#add-companies" data-toggle="modal" class="btn btn-success btn-md">Add Company &nbsp;<i class="fa fa-plus"></i></button>
                <table class="table table-striped table-hover">
                	<thead>
                		<tr>
                			<th>name</th>
                            <th>user name</th>
                			<th>logo</th>
                            <th>status</th>
                			<th>description</th>
                			<th style="
                			text-align: right">#</th>
                		</tr>
                	</thead>
                	<tbody>
                    @foreach($companies as $company)
                		<tr >
                			<td>
                                <a target="_blank" href="{{$company->website}}">{{$company->name}}</a>
                            </td>
                            <td>
                                <a target="_blank" href="{{$company->website}}">{{$company->user->name}}</a>
                            </td>
                			<td>
                                <div class="comp-img">
                                    <img src="{{$company->logo}}" alt="{{$company->name}}-logo">
                                </div>
                            </td>
                            <td>
                                <a target="_blank" href="#">{{$company->status}}</a>    
                            </td>
                			<td width="60%">
                                <textarea class="form-control" readonly style="width: 100%">{{$company->description}}</textarea>
                            </td>
                            <td style="text-align: right; vertical-align: middle">
                                <a href="{{route('admin.deleteCompany',[$company->id])}}" onclick="return confirm('Do want to delete \'{{$company->name}}\' ?')" type="button" class="btn btn-danger btn-xs">Delete</a>
                            </td>
                            <td style="text-align: right; vertical-align: middle">
                                <a href="{{route('admin.getEditCompany',[$company->id])}}" type="button" class="btn btn-danger btn-xs">Update</a>
                            </td>
                		</tr>
                    @endforeach
                	</tbody>
                </table>
                {{$companies->links()}}
            </div>
        </div>
    </div>

</div>
@endsection