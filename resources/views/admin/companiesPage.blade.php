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
                <a href="#">Add Users manually</a>
            </li>
            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
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
    				
                    <form action="{{route('admin.addNewCompany')}}" method="post" role="form">
                        {{ csrf_field() }}
                    	<div class="form-group">
                    		<label for="">Company name</label>
                    		<input type="text" class="form-control" name="name" id="" placeholder="Google Inc.">
                    	</div>

                        <div class="form-group">
                            <label for="">Website</label>
                            <input type="text" class="form-control" name="website" id="" placeholder="https://google.com">
                        </div>

                        <div class="form-group">
                            <label for="">Logo image link</label>
                            <input type="text" class="form-control" name="logo" id="" placeholder="http://google.com/logo.jpg">
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea class="form-control" name="description" placeholder="Description" style="width: 100%"></textarea>
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
                			<th>logo</th>
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
                                <div class="comp-img">
                                    <img src="{{$company->logo}}" alt="{{$company->name}}-logo">
                                </div>
                            </td>
                			<td width="60%">
                                <textarea class="form-control" readonly style="width: 100%">{{$company->description}}</textarea>
                            </td>
                            <td style="text-align: right; vertical-align: middle">
                                <a href="{{route('admin.deleteCompany',[$company->id])}}" onclick="return confirm('Do want to delete \'{{$company->name}}\' ?')" type="button" class="btn btn-danger btn-xs">Delete</a>
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