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
    				<h4 class="modal-title">Add User</h4>
    			</div>
    			<div class="modal-body">
    				
                    <form action="{{route('admin.addStudent')}}" method="post" role="form">
                        {{ csrf_field() }}
                    	<div class="form-group">
                    		<label for="">Index</label>
                    		<input type="text" class="form-control" name="name" id="" placeholder="134000A">
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
                <span class="companies-pag">{{$students->links()}}</span>
                <button style="float: right"  data-target="#add-companies" data-toggle="modal" class="btn btn-success btn-md">Add User &nbsp;<i class="fa fa-plus"></i></button>
                <table class="table table-striped table-hover">
                	<thead>
                		<tr>
                			<th>name</th>
                            <th>index</th>
                            <th>status</th>
   
                	</thead>
                	<tbody>
                    @foreach($students as $student)
                		<tr >
                			<td>
                                <a target="_blank" href="#">{{$student->firstName}} {{$student->lastName}}</a>
                            </td>
                            <td>
                                <a target="_blank" href="#">{{$student->user->name}}</a>
                            </td>
                            <td>
                                <a target="_blank" href="#">{{$student->user->status}}</a>
                            </td>
                            <td style="text-align: right; vertical-align: middle">
                                <a href="{{route('admin.deleteUser',[$student->id])}}" onclick="return confirm('Do want to delete \'{{$student->firstName}}\' ?')" type="button" class="btn btn-danger btn-xs">Delete</a>
                            </td>
                            <td style="text-align: right; vertical-align: middle">
                                <a href="{{route('admin.reserUserPassword',[$student->user->id])}}" onclick="return confirm('Do want to reset password of \'{{$student->firstName}}\' ?')" type="button" class="btn btn-danger btn-xs">Reset Password</a>
                            </td>
                            <td style="text-align: right; vertical-align: middle">
                                <a href="{{route('admin.getEditStudent',[$student->user->id])}}" type="button" class="btn btn-danger btn-xs">Update</a>
                            </td>                            
                		</tr>
                    @endforeach
                	</tbody>
                </table>
                {{$students->links()}}
            </div>
        </div>
    </div>

</div>
@endsection