@extends('layouts.new_master')

@section('header')
        <!--grid-->
        <link rel="stylesheet" type="text/css" href="{{asset('css_new/demo.css')}}" />
        <noscript>
            <link rel="stylesheet" type="text/css" href="{{asset('css_new/fallback.css')}}" />
        </noscript>
        <!--[if lt IE 9]>
        <link rel="stylesheet" type="text/css" href="css/fallback.css" />
        <![endif]-->
        <!--end grid-->
@endsection

@section('content')
    <div id="ri-grid" style="position: absolute;z-index: -10;"  class="ri-grid ri-grid-size-1 ri-shadow hidden-xs" >
        <img class="ri-loading-image" src="{{asset('images/loading.gif')}}"/>
        <ul >
            @foreach($data as $dat)
            @if(file_exists(public_path('profilepics_13/'.$dat.'.jpg')))
            <li><a href="#"><img src="{{asset('profilepics_13').'/'.$dat.'.jpg'}}"/></a></li>
            @endif
            @endforeach
        </ul>
    </div>

<!--         <section id="fh5co-home" data-section="home" style="background-image: url({{ url('/images_2018/full_image_3.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="gradient"></div>
        <div class="container">
            <div class="text-wrap">
                <div class="text-inner">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h1 class="to-animate">FIT Future Careers 2018</h1>
                            <h2 class="to-animate">The in-house recruitment program of the Faculty of Information Technology, University of Moratuwa!</h2>
                            <div class="call-to-action">
                                <a href="{{route('students')}}" class="demo to-animate">Students</a>
                                <a href="{{route('companies')}}" class="demo to-animate">Companies</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <section id="fh5co-home"  data-section="home" data-stellar-background-ratio="0.5" style="background-color: rgba(0,30,140,0.7);" >

        <div class="gradient visible-xs"></div>
        <div class="container">

            <div class="text-wrap">
                <div class="text-inner">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2" >

                            <h1 class="to-animate">FIT Future Careers 2018</h1>
                            <h2 class="to-animate" style="font-weight: bold">The in-house recruitment program of the Faculty of Information Technology, University of Moratuwa!</h2>
                            <div class="call-to-action">
                                <a href="{{route('students')}}" class="demo to-animate">Students</a>
                                <a href="{{route('companies')}}" class="demo to-animate">Companies</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="fh5co-explore" data-section="explore">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-heading text-center">
                    <h2 class="to-animate">Faculty of Information Technology</h2>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 subtext to-animate">
                            <h3>The Faculty of Information Technology is one of the five faculties in the University of Moratuwa and is the first ever faculty of its kind in the national university system of Sri Lanka. The Faculty was established in June 2001 to cater to the growing need for Information Technology(IT) professionals in the country. Presently, the Faculty conducts two internal degree programmes, namely, Bachelor of  Science Honours (B.Sc. Hons.) in Information Technology and Bachelor of  Science Honours (B.Sc. Hons.) in Information Technology & Management, and the external degree programme, Bachelor of Information Technology.</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="team-box text-center to-animate-2">
                                <div class="user"><img class="img-reponsive" src="{{ url('/images_2018/Fac1.JPG') }}" alt="Faculty of Information Technology"></div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="team-box text-center to-animate-2">
                                <div class="user"><img class="img-reponsive" src="{{ url('/images_2018/Fac2.JPG') }}" alt="Fac Image 2"></div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="team-box text-center to-animate-2">
                                <div class="user"><img class="img-reponsive" src="{{ url('/images_2018/Fac3.JPG') }}" alt="Fac Image 3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fh5co-explore fh5co-explore-bg-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 section-heading text-center to-animate-3">
                        <h2 class="to-animate">Social Contribution</h2>
                    </div>
                    <div >
                        <div class="mt">
                            <div class="col-md-4 to-animate-3 text-center ">
                                <h4>INTECS OUTREACH</h4>
                                <div class="user"><img class="img-reponsive" src="{{ url('/images_2018/outreach.jpg') }}" alt="OutReach"></div>
                                <br>
                                <p>INTECS continued to do their good work on 2016 starting with Kalyani Maha Vidyalaya for the first Outreach session on 2016. They continues to pave the path for the young minds in Kurunagala and Ruwanwella with the next session of Outreach held in Ruwanwella Rajasinghe Central College and Vihayaba National College.</p>
                            </div>
                            <div class="col-md-4 to-animate-3 text-center">
                                <h4>FIT Hearts</h4>
                                <div class="user"><img class="img-reponsive" src="{{ url('/images_2018/FitHearts.jpg') }}" alt="FitHearts"></div>
                                <br>
                                <p>FIT Hearts is a project which is carried by a team of Active Citizens, Information Technology, University of Moratuwa for donating a Computer Laboratory to Ranugalla Junior School in Monaragala district.</p>
                            </div>
                            <div class="col-md-4 to-animate-3 text-center">
                                <h4>Haritha Mithuro</h4>
                                <div class="user"><img class="img-reponsive" src="{{ url('/images_2018/HarithaMithuro.jpg') }}" alt="Haritha Mithuro"></div>
                                <br>
                                <p>Haritha Mithuro is a social action project which is initiated by a group of nature lovers called "G SQUAD" with the intention of changing the mindset of school children to love and protect the environment by following certain green concepts.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="fh5co-talents" data-section="talents">
        <div class="container" >
                <div class="col-md-12 to-animate section-heading text-center" >
                        <h2 class="to-animate"  style="margin-top: -70px">Talents</h2>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box-services">
                                <i class="icon-chemistry to-animate-2"></i>
                                <div class="fh5co-post to-animate">
                                    <div class="user"><img class="img-reponsive" src="{{ url('/images_2018/FitSixes1.jpg') }}" alt="Roger Garfield"></div>
                                </div>
                            </div>

                            <div class="box-services">
                                <i class="icon-energy to-animate-2"></i>
                                <div class="fh5co-post to-animate">
                                    <div class="user"><img class="img-reponsive" src="{{ url('/images_2018/ing1.jpg') }}" alt="Roger Garfield"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-services">
                                <i class="icon-trophy to-animate-2"></i>
                                <div class="fh5co-post to-animate">
                                    <div class="user"><img class="img-reponsive" src="{{ url('/images_2018/Ing2.jpg') }}" alt="Roger Garfield"></div>
                                </div>
                            </div>

                            <div class="box-services">
                                <i class="icon-paper-plane to-animate-2"></i>
                                <div class="fh5co-post to-animate">
                                    <div class="user"><img class="img-reponsive" src="{{ url('/images_2018/Ing3.jpg') }}" alt="Roger Garfield"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-services">
                                <i class="icon-people to-animate-2"></i>
                                <div class="fh5co-post to-animate">
                                    <div class="user"><img class="img-reponsive" src="{{ url('/images_2018/FitSixes2.jpg') }}" alt="Roger Garfield"></div>
                                </div>
                            </div>

                            <div class="box-services">
                                <i class="icon-screen-desktop to-animate-2"></i>
                                <div class="fh5co-post to-animate">
                                    <div class="user"><img class="img-reponsive" src="{{ url('/images_2018/Ing4.jpg') }}" alt="Roger Garfield"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>

    <hr>
<!--     <section id="fh5co-sponsors" data-section="sponsors">
        <div class="fh5co-sponsors">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 section-heading text-center">
                        <h2 class="to-animate">Sponsors</h2>
                    </div>
                </div>
                <hr>
                <h4 class="text-center to-animate"> Gold Sponsors</h4>
                <div class="row">
                     <div class="col-md-2 col-sm-3 col-xs-6 col-sm-offset-0 col-md-offset-1">
                        <div class="partner-logo to-animate-2">
                            <img src="{{ url('/images_2018/logo5.png') }}" alt="Partners" class="img-responsive">
                        </div>
                     </div>

                    <div class="col-md-2 col-sm-3 col-xs-6">
                        <div class="partner-logo to-animate-2">
                            <img src="{{ url('/images_2018/logo5.png') }}" alt="Partners" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-6">
                        <div class="partner-logo to-animate-2">
                            <img src="{{ url('/images_2018/logo5.png') }}" alt="Partners" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-6">
                        <div class="partner-logo to-animate-2">
                            <img src="{{ url('/images_2018/logo5.png') }}" alt="Partners" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <div class="partner-logo to-animate-2">
                            <img src="{{ url('/images_2018/logo5.png') }}" alt="Partners" class="img-responsive">
                        </div>
                    </div>
                </div>
                <h4 class="text-center to-animate"> Silver Sponsors</h4>
                <div class="row">
                    <div class="col-md-2 col-sm-3 col-xs-6 col-sm-offset-0 col-md-offset-1">
                        <div class="partner-logo to-animate-2">
                            <img src="{{ url('/images_2018/logo1.png') }}" alt="Partners" class="img-responsive">
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-3 col-xs-6">
                        <div class="partner-logo to-animate-2">
                            <img src="{{ url('/images_2018/logo2.png') }}" alt="Partners" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-6">
                        <div class="partner-logo to-animate-2">
                            <img src="{{ url('/images_2018/logo3.png') }}" alt="Partners" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-6">
                        <div class="partner-logo to-animate-2">
                            <img src="{{ url('/images_2018/logo4.png') }}" alt="Partners" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <div class="partner-logo to-animate-2">
                            <img src="{{ url('/images_2018/logo5.png') }}" alt="Partners" class="img-responsive">
                        </div>
                    </div>
                </div>
                <h4 class="text-center to-animate"> Co Sponsors</h4>
                <div class="row">
                    <div class="col-md-2 col-sm-3 col-xs-6 col-sm-offset-0 col-md-offset-1">
                        <div class="partner-logo to-animate-2">
                            <img src="{{ url('/images_2018/logo1.png') }}" alt="Partners" class="img-responsive">
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-3 col-xs-6">
                        <div class="partner-logo to-animate-2">
                            <img src="{{ url('/images_2018/logo2.png') }}" alt="Partners" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-6">
                        <div class="partner-logo to-animate-2">
                            <img src="{{ url('/images_2018/logo3.png') }}" alt="Partners" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-6">
                        <div class="partner-logo to-animate-2">
                            <img src="{{ url('/images_2018/logo4.png') }}" alt="Partners" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <div class="partner-logo to-animate-2">
                            <img src="{{ url('/images_2018/logo5.png') }}" alt="Partners" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->


@endsection
@section('scr')

    
        <script type="text/javascript">
        $(function() {

            $( '#ri-grid' ).gridrotator( {
                rows : 5,
                columns : 11,
                animType        : 'slideRight,slideTop',
                slideshow       : true,
                interval        : 1000,
                animSpeed       : 800,

                w320 : {
                    rows : 3,
                    columns : 4
                },
                w240 : {
                    rows : 3,
                    columns : 3
                },
                nochange : [0,1,2,3],
                preventClick : false
            } );

        });
    </script>
@endsection