@extends('layouts.master')

@section('content')
<div class="container" style="padding-top: 72px">
    <div class="panel panel-default">
        <div id="student" class="panel-body">
            <div style="text-align: right; padding-right: 20px">{{ $companies->links() }}</div>
            <div id="student-list" class="list-group">
                @foreach($companies as $company)
                    <div class="item">
                        <div class="list-group-item">
                            <div class="row-picture">
                                <img class="circle" src="{{$company->logo}}" alt="icon">
                            </div>
                            <div class="row-content">
                                <h4 style="font-weight: 500;" class="list-group-item-heading">{{$company->name}}</h4>

                                <p class="list-group-item-text text-justify">{{$company->description}}

                                </p>
                                <a style="color: #00b0ff; float: right" target="_blank" href="{{$company->website}}" class="btn btn-raised btn-xs">Read more</a>
                            </div>
                        </div>
                        <div class="list-group-separator"></div>
                    </div>
                @endforeach
            </div>
            <div style="padding-left: 20px">{{ $companies->links() }}</div>
        </div>
    </div>

</div>
    <script>

    </script>
@endsection

@section('scripts')
@parent
@endsection
