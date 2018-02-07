@extends('layouts.master')

@section('head')
    @parent
    <style>
        .list-group-item em{
            font-style: normal;
            color: #ffbe18;
        }
        .ais-infinite-hits--showmore button{
            border-radius: 5px;
            border: solid 1px #8c8a8a;
            box-shadow: none;
            background-color: #ffbe62;
        }
        .highlight {
            color: #333;
            background-color: yellow
        }
        .row-picture{
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-size: 100%;
        }

        @media (min-width: 767px){
            .moreDetails{
                margin-left: 85px;
            }
        }
    </style>
@endsection

@section('content')

    <div class="modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title"><i class="fa fa-graduation-cap"></i></h4>
                </div>
                <div class="modal-body">
                    <img src="/img/ajaxloading.gif" class="loading-img" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<div class="container" style="padding-top: 72px">
    <div class="panel panel-default">
        <div id="studentn" class="panel-body">
            <div style="text-align: right; padding-right: 20px">
            <a style="color: #00b0ff; float: right" class="btn btn-raised btn-xs " href="{{route('students_1')}}">Batch 12</a><button class="btn btn-danger"></button>    
        </div>
            <div style="text-align: right; padding-right: 20px">{{ $students->links() }}</div>
            <div id="student-list" class="list-group">
                @foreach($students as $student)
                    <div class="item">
                        <div class="list-group-item">
                            <div class="row-picture" style="background: url(/profilepics_13/{{$student->profile_img}}) no-repeat; background-size: 100%;">
                            </div>
                            <div class="row-content">
                                <span hidden class="std_index">{{$student->index}}</span>
                                <h4 style="font-weight: 500;" class="list-group-item-heading">{{$student->firstName}} {{$student->lastName}} <span style="background-color: rgba(221, 17, 79, 0.93); font-size: small;">{{$student->job_status=='hired'?'&nbsp;HIRED&nbsp;':''}}</span></h4>

                                <p class="list-group-item-text text-justify">{{$student->objective}}</p>
                                @foreach(explode(",", $student->techs) as $tech)
                                    <span style="margin-bottom: 10px" class="label label-default">{{$tech}}</span>
                                @endforeach
                                <a style="color: #00b0ff; float: right" class="btn btn-raised btn-xs readMore">read more</a><button class="btn btn-danger"></button>
                            </div>
                            <div class="moreDetails">

                            </div>
                        </div>
                        <div class="list-group-separator"></div>
                    </div>
                @endforeach
            </div>
            <div style="padding-left: 20px">{{ $students->links() }}</div>
        </div>
    </div>

</div>
    <script>

    </script>
@endsection

@section('scripts')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.min.js"></script>
<script>
    jQuery.fn.highlight=function(c){function e(b,c){var d=0;if(3==b.nodeType){var a=b.data.toUpperCase().indexOf(c),a=a-(b.data.substr(0,a).toUpperCase().length-b.data.substr(0,a).length);if(0<=a){d=document.createElement("span");d.className="highlight";a=b.splitText(a);a.splitText(c.length);var f=a.cloneNode(!0);d.appendChild(f);a.parentNode.replaceChild(d,a);d=1}}else if(1==b.nodeType&&b.childNodes&&!/(script|style)/i.test(b.tagName))for(a=0;a<b.childNodes.length;++a)a+=e(b.childNodes[a],c);return d} return this.length&&c&&c.length?this.each(function(){e(this,c.toUpperCase())}):this};jQuery.fn.removeHighlight=function(){return this.find("span.highlight").each(function(){this.parentNode.firstChild.nodeName;with(this.parentNode)replaceChild(this.firstChild,this),normalize()}).end()};
</script>

    <script>

        function getURLParameter(name) {
            return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
        }

        $(document).ready(function() {
            var qu = getURLParameter('q');
            if(qu !== null ){
                $('.pagination').hide();
                console.log(qu);
                var resultObj = $('#student-list');
                if(qu.length >= 3){

                    var queryTokenize = qu.split(' ');
                    queryTokenize.forEach(function(qToken) {
                        resultObj.highlight(qToken);
                    });

                }
            }
        });

        //stdSearch
        $('.query').on('input',function(){

            console.log(window.location.href);
            window.history.pushState('page2', 'Title', '{{route('students')}}?q='+this.value);
            var reloadBtn =
                    '<a href="{{route('students')}}" class="btn btn-raised btn-xs">Reload' +
                    '</a>'
            var resultObj = $('#student-list');
            if(this.value.length >= 3){
                $('.searching_ico').show();
                $.ajax({
                    type: 'GET',
                    url: '{{route('stdSearch')}}',
                    data: { q: this.value },
                    searchQuery:this.value,
                    resultObj: this.resultObj,
                    dataType:'json',
                    success: function (json) {
                        //document.write(json["data"]);
                        let dataObj = json;

                        resultObj.html('');

                        if (typeof dataObj.forEach == 'function') {
                            dataObj.forEach(function(element) {

                                var techArray = element["techs"].split(',');
                                var techhtml = '';
                                techArray.forEach(function(tech) {
                                    techhtml = techhtml.concat('<span style="margin-bottom: 10px" class="label label-default">' + tech +'</span>');
                                });

                                var hired_status = element["job_status"];
                                var hired_html = "";
                                if(hired_status=='hired'){
                                    hired_html = "<span style='background-color: rgba(221, 17, 79, 0.93); font-size: small;'>&nbsp;" + hired_status.toUpperCase() + "&nbsp;</span>";
                                }


                                var hitTemplate =
                                        '<div class="item">' +
                                        '<div class="list-group-item">' +
                                        '<div class="row-picture">' +
                                        '<img class="circle" style="width: 70px; height: 70px" src="/profilepics/@{{profile_img}}" alt="icon">' +
                                        '</div>' +
                                        '<div class="row-content">' +
                                        '<span hidden class="std_index">@{{index}}</span>'+
                                        '<h4 style="font-weight: 500;" class="list-group-item-heading">@{{firstName}} @{{lastName}}'+ hired_html +'</h4>' +
                                        '<p class="list-group-item-text text-justify">@{{objective}}</p>' +
                                        techhtml +
                                        '<a style="color: #00b0ff; float: right" class="btn btn-raised btn-xs readMore">read more</a>' +
                                        '</div>' +
                                        '<div class="moreDetails"></div>'+
                                        '</div>' +
                                        '<div class="list-group-separator"></div>' +
                                        '</div>';

                                let output = Mustache.render(hitTemplate, element);
                                $('#student-list').append(output);
                                $('.searching_ico').hide();
                            });
                        }



                        if(dataObj.length == 0){
                            $('#student-list').html('No results '+reloadBtn);
                        }
                        if(this.searchQuery.length >= 3){

                            var queryTokenize = this.searchQuery.split(' ');
                            queryTokenize.forEach(function(qToken) {
                                resultObj.highlight(qToken);
                            });

                        }
                        $('.pagination').hide();
                    }
                });

            }
            else{
                $('.pagination').hide();
                $('#student-list').html('Please enter more specific query, No matching results '+reloadBtn);
            }
        });

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
                let index_no = $(this).parent().find('.std_index').text();
                $.ajax({
                    url: "/careers/students/"+index_no,
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
