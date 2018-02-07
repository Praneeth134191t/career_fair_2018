@extends('layouts.master')

@section('head')
    @parent
<!-- -->
@endsection

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
                                <span hidden class="company_id">{{$company->id}}</span>
                                <h4 style="font-weight: 500;" class="list-group-item-heading">{{$company->name}}</h4>

                                <p class="list-group-item-text text-justify">{{$company->description}}

                                </p>
                                <a style="color: #00b0ff; float: right" target="_blank" href="{{$company->website}}" class="btn btn-raised btn-xs">Read more</a>
                                <a style="color: #00b0ff; float: right" href="#" class="btn btn-raised btn-xs readMore">Vacancies</a>
                            </div>
                            <div class="moreDetails">

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
@endsection

@section('scripts')
@parent
<script>

        $(document).on('click', '.readMore' , function() {
            let elem = $(this).parent().parent();
            if(elem.parent().hasClass('expanded')){
                elem.find('.std_more').remove();
                $(this).html('Read more');
                elem.parent().removeClass('expanded');
            }else{
                var expandedElems = $('#student-list').find('.expanded');
                console.log(expandedElems.length);
                expandedElems.remove();
                elem.parent().addClass('expanded');
                $(this).html('X');
                elem.find('.moreDetails').html('<img src="/img/ajaxloading.gif" class="loading-img" alt="">');
                let company_id = $(this).parent().find('.company_id').text();
                $.ajax({
                    url: "/careers/com/"+company_id,
                    type: 'GET',
                    success: function(res) {
                        elem.find('.moreDetails').hide();
                        elem.find('.moreDetails').html(res);
                        elem.find('.moreDetails').fadeIn(500);
                        //$('.modal-body').html(res);
                    }
                });
            }
        });

    </script>
@endsection
