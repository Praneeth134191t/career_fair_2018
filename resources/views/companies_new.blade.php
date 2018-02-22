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
<section id="fh5co-explore" data-section="companies">
        <div class="container">
            <br><br>
                <h2 class="to-animate-3 text-center">Companies</h2>
            <div class="row">
                <div class="col-md-12 section-heading text-center to-animate">
                    <input class="search-inbox query" value="{{app('request')->input('q')}}" id="q" type="text" placeholder="Search">
                    <!--<span class="search">Search</span>-->
                    <br>
                    <ul class="pagination" style="font-size: 0.7em">
                        {{ $companies->links() }}
                    </ul>
                    
                </div>
                </div>
        </div>
        <div class="fh5co-explore fh5co-explore-bg-color">
            <div class="container to-animate">
                        <div class="container" id="company-list">
                        @foreach($companies as $company)    
                        <div class="list-item to-animate">
                            <div class="row">
                                <div class="col-lg-2"><img class="img-responsive" src="{{$company->logo}}" alt=""></div>
                                <div class="col-lg-9">
                                    <h3>{{$company->name}}</h3>
                                    <h4>
                                        {{$company->description}}
                                    </h4>
                                    @if(count($company->vacancies)>0)
                                    <h4>
                                        Vacancies :
                                        @foreach($company->vacancies as $vac)
                                        
                                        <button class="cv-btn readMore">{{$vac->name}}<span hidden class="vac_id">{{$vac->id}}</span></button> 
                                        @endforeach
                                    </h4>
                                    @endif
                                    <div class="pull-right">
                                    <a class="cv-btn" target="_blank" href="{{$company->website}}" style="text-decoration: none;background-color: #D3D3D3;color: black"> Website</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-md-12  text-center">
                            <ul class="pagination" style="font-size: 0.7em">
                                {{ $companies->links() }}
                            </ul>
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
            document.getElementById("q").focus();
            var qu = getURLParameter('q');
            if(qu !== null ){
                $('.pagination').hide();
                
                var resultObj = $('#company-list');
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
            window.history.pushState('page2', 'Title', '{{route('companies')}}?q='+this.value);
            var reloadBtn =
                    '<a href="{{route('companies')}}" class="btn btn-raised btn-xs reload">Reload' +
                    '</a>'
            var resultObj = $('#company-list');
            if(this.value.length == 0){
                window.location.replace("{{route('companies')}}");       
            }
            if(this.value.length >= 3){
                $('.searching_ico').show();
                $.ajax({
                    type: 'GET',
                    url: '{{route('comSearch')}}',
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
                                
                                var vacArray = element["vacs"];

                                var vachtml ='';
                                if(vacArray.length>0){
                                vachtml=vachtml+'<h4> Vacancies : ';    
                                
                                
                                vacArray.forEach(function(tech) {

                                    vachtml = vachtml.concat(('<button class="cv-btn readMore">'+tech.name+'<span hidden class="vac_id">'+tech.id+'</span></button>'+' '));
                                });
                                vachtml = vachtml.concat('</h4>');
                                }

                                var hitTemplate =
                                        '<div class="list-item ">' +
                                            '<div class="row">' +
                                                '<div class="col-lg-2">' +
                                                    '<img class="img-responsive"  src="@{{logo}}" alt="icon">' +
                                                '</div>' +
                                                '<div class="col-lg-9">' +
                                                    '<h3>@{{name}}</h3>' +
                                                    '<h4>@{{description}}</h4>' +
                                                    vachtml+
                                                    '<div class="pull-right">'+
                                    '<a class="cv-btn" target="_blank" href="@{{website}}" style="text-decoration: none;background-color: #D3D3D3;color: black"> Website</a>';

                                let output = Mustache.render(hitTemplate, element);
                                $('#company-list').append(output);
                                $('.searching_ico').hide();
                            });
                        }



                        if(dataObj.length == 0){
                            $('#company-list').html('No results '+reloadBtn);
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
                $('#company-list').html('Please enter more specific query, No matching results '+reloadBtn);
            }
        });
        $(document).on('click', '.readMore' , function() {
                let vac_id = $(this).find('.vac_id').text();
                $.ajax({
                    url: "/careers/com_vacs/"+vac_id,
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


