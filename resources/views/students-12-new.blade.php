@extends('layouts.new_master')

@section('header')

@endsection

@section('content')
<style >
            .highlight {
            color: #333;
            background-color: yellow
        }
</style>
<section id="fh5co-explore" data-section="explore">
        <div class="container">
            <br><br>
                <h2 class="to-animate-3 text-center">All Candidates of Batch 12</h2>
            <div class="row">
                <div class="col-md-12 section-heading text-center to-animate">
                    <input class="search-inbox query" value="{{app('request')->input('q')}}" id="q" type="text" placeholder="Search">
                    <!--<span class="search">Search</span>-->
                    <br>
                    <ul class="pagination" style="font-size: 0.7em">
                        {{ $students->links() }}
                    </ul>
                    <br>
                    
                    <a href="{{route('students')}}" class="text-center" style="font-size: 0.7em">View Batch 13</a>
                </div>
                </div>
        </div>
        <div class="fh5co-explore fh5co-explore-bg-color">
            <div class="container to-animate">
                        <div class="container" id="student-list">    
                        @foreach($students as $student)    
                        <div class="list-item to-animate">
                            <div class="row">
                                <div class="col-lg-2"><img class="img-circle img-responsive" src="{{asset('profilepics').'/'.$student->profile_img}}" alt=""></div>
                                
                                <div class="col-lg-9">

                                    <h3>{{$student->firstName}} {{$student->lastName}}<span style="background-color: rgba(221, 17, 79, 0.93); font-size: small;">{{$student->job_status=='hired'?'&nbsp;HIRED&nbsp;':''}}</span></h3>
                                    <h4>
                                        {{$student->objective}}
                                    </h4>
                                    <h4>
                                        @foreach(explode(",", $student->techs) as $tech)
                                            <span class="label label-default skills">{{$tech}}</span>
                                        @endforeach
                                    </h4>
                                    <div class="pull-right">
                                        <span hidden class="std_index">{{$student->index}}</span>
                                        <a style="text-decoration: none;background-color: #D3D3D3;color: black" class="cv-btn" href="{{ $student->cv_link  }}" target="_blank">View CV</a>
                                        <button class="cv-btn readMore" style="text-decoration: none;background-color: #D3D3D3;color: black">More Details</a></button>   
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <div class="moreDetails" style="display: ;">
    </div>     
@endsection
@section('scr')
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
        $('.query').on('keyup',function(){

            console.log(window.location.href);
            window.history.pushState('page2', 'Title', '{{route('students_1')}}?q='+this.value);
            var reloadBtn =
                    '<a href="{{route('students_1')}}" class="btn btn-raised btn-xs">Reload' +
                    '</a>'
            var resultObj = $('#student-list');
            if(this.value.length >= 3){
                $('.searching_ico').show();
                $.ajax({
                    type: 'GET',
                    url: '{{route('stdSearch_1')}}',
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
                                    techhtml = techhtml.concat('<span class="label label-default skills">'+tech+'</span>'+' ');
                                });
                                   
                                
                            

                                var hired_status = element["job_status"];
                                var hired_html = "";
                                if(hired_status=='hired'){
                                    hired_html = "<span style='background-color: rgba(221, 17, 79, 0.93); font-size: small;'>&nbsp;" + hired_status.toUpperCase() + "&nbsp;</span>";
                                }


                                var hitTemplate =
                                        '<div class="list-item">' +
                                            '<div class="row">' +
                                                '<div class="col-lg-2">' +
                                                    '<img class="img-circle img-responsive"  src="/profilepics/@{{profile_img}}" alt="icon">' +
                                                '</div>' +
                                                '<div class="col-lg-9">' +
                                                    '<h3>@{{firstName}} @{{lastName}}'+ hired_html +'</h3>' +
                                                    '<h4>@{{objective}}</h4>' +
                                                    '<h4>'+
                                                    techhtml+
                                                    '</h4>'+
                                                    '<div class="pull-right">'+
                                                        '<span hidden class="std_index">@{{index}}</span>'+  
                                                        '<a class="cv-btn" style="text-decoration: none;background-color: #D3D3D3;color: black"  href="@{{cv_link}}" target="_blank">View CV</a>'+
                                                        ' '+
                                                        '<button class="cv-btn readMore" style="text-decoration: none;background-color: #D3D3D3;color: black">More Details</button>'+   
                                                    '</div>'+
                                                '</div>' +
                                            '</div>'+
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
                let index_no = $(this).parent().find('.std_index').text();
                console.log(index_no);
                $.ajax({
                    url: "/careers/students/"+index_no,
                    type: 'GET',
                    success: function(res) {
                        //$('.moreDetails').hide();
                        $('.moreDetails').html(res);
                        $('#student_modal').modal('show');
                        //elem.find('.moreDetails').fadeIn(500);
                        //$('.modal-body').html(res);
                    }
                });
        });

    </script>
    
@endsection


