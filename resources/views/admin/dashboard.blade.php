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

    <div class="container"  id="page-content-wrapper">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table class="table table-bordered table-hover">
                	<thead>
                		<tr>
                			<th>#</th>
                		</tr>
                	</thead>
                	<tbody>
                		<tr>
                			<td><a target="_blank" href="{{route('admin.exportProfiles')}}">Export Profile Details as csv file</a></td>
                		</tr>
                	</tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection