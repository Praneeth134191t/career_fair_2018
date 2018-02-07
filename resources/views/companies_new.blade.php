@extends('layouts.new_master')

@section('header')

@endsection

@section('content')
<section id="fh5co-explore" data-section="companies">
        <div class="container">
            <br><br>
                <h2 class="to-animate-3 text-center">Companies</h2>
            <div class="row">
                <div class="col-md-12 section-heading text-center to-animate">
                    
                    <ul class="pagination" style="font-size: 0.7em">
                        {{ $companies->links() }}
                    </ul>
                    
                </div>
                </div>
        </div>
        <div class="fh5co-explore fh5co-explore-bg-color">
            <div class="container to-animate">
                        <div class="container">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="moreDetails" style="display: ;">
    </div>     
@endsection
@section('scr')
<script>
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


