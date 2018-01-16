@extends('layouts.master')

@section('head')
    @parent
    @section('title') FIT Career Fair 2017 | Intecs | ITFAC | UOM @endsection
    <link rel="stylesheet" href="css/cssgram.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/aos.js"></script>
    <style>
        body {
            background: url(images/bg-pattern.png), #fff;
        }
    </style>
    <script src="https://unpkg.com/react@15/dist/react.js"></script>
    <script src="https://unpkg.com/react-dom@15/dist/react-dom.js"></script>
@endsection

@section('header')
    @parent
    <link rel="stylesheet" href="lib/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="lib/device-mockups/device-mockups.min.css">
@show

@section('content')
    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="header-content">
                        <div class="header-content-inner livefeed">
                            <h1>FIT Future Careers 2017</h1>

                            <h2>The in-house recruitment program of the Faculty of Information Technology, University of
                                Moratuwa!</h2>
                            <a href="#itfac" class="btn btn-outline btn-xl page-scroll">Learn more</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-1 livefeed">
                    <div class="device-container">
                        <div class="feedContainer">
                            <div id="views-list" class="scroller">
                                @foreach($data as $key=>$prof_view)
                                    <div class='well well-sm'
                                         style='width: 100%; min-height: 40px; z-index: {{count($data)-$key}}'>
                                        <img width='30px' height='30px'
                                             src='/profilepics/{{$prof_view->causer->profile_img}}'>
                                        <a target='_blank'
                                           href="{{route('students_view',['id'=>$prof_view->causer->user->name,'count'=>'false'])}}">{{$prof_view->causer->firstName}}
                                            's</a> profile has been viewed
                                        <br><span class="time-ago"></span>

                                        <div style='clear:both'></div>
                                        <span class="times" hidden>{{$prof_view->created_at->toW3cString()}}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>


    <div class="container">
        <section id="itfac" class="download text-center">
            <div data-aos="fade" style="height: 100vh; display: inline-block">
                <a name="itfac"></a>

                <div class="row" style="padding-top: 15%">
                    <div class="col-md-6">
                        <h1>UNIQUE</h1>

                        <p>
                            The first ever government owned IT faculty in national university system of Sri Lanka.
                            Established in 2001 Faculty of information Technology is the youngest among all three
                            faculties in University of Moratuwa.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <img class="" style="width: 80%" src="http://i.imgur.com/gxXnNLT.jpg" alt="">
                    </div>
                </div>
                <center style="padding-top: 5%"><a href="#section1"><i class="chevron bottom"></i></a></center>

            </div>
        </section>
        <div data-aos="fade" style="height: 100vh; display: inline-block">
            <a name="section1"></a>

            <div class="row" style="padding-top: 10%">
                <div class="col-md-6">
                    <img class="" style="width: 90%" src="http://i.imgur.com/rqGW1js.png" alt="">

                    <p style="padding-top: 10%">
                        Continuing its trend the faculty undergraduates continued their winning streak in 2016 too.
                        Emerged as Champions in HackX 2k16 - Inter-University Hackathon, Finalists in ICTA e-Swabhimani
                        2016, Selected for Winners Circle in National Best Quality Software Awards 2016 - Tertiary
                        Category and becoming second runners up in Imagine Cup National Finalist 2016 - World
                        Citizenship.
                    </p>
                </div>
                <div class="col-md-6">
                    <h1 style="text-align: right">CONQUERING</h1>

                    <p style="text-align: right">
                        Undergraduates of the IT faculty has the trend of winning wherever they go. In 2015 they have
                        conquered the championship and 2nd runners up in Hackanix, 1st runners up under Gaming Category
                        in Microsoft Imagine Cup 2015, 2nd runners up in Mora Hack 2015, 2nd runners up in HackaDev 2015
                        and 2nd runners up in IESL – YMS Hackathon 2015.
                    </p>
                    <center><img class="" style="width: 60%" src="http://i.imgur.com/bSH4CKG.png" alt=""></center>
                </div>
            </div>
            <center style="padding-top: 5%">
                <a href="#section2"><i class="chevron bottom"></i></a>
            </center>
        </div>

        <div data-aos="fade" style="height: 100vh; display: inline-block">
            <a name="section2"></a>

            <div class="row" style="padding-top: 15%">
                <div class="col-md-6">
                    <h1>ATHLETIC</h1>

                    <p>
                        Uom is the SLUG winners of 2012 and the majority of the team contained IT faculty students.
                    </p>

                    <p>FIT Sixes is a major cricket tournament organized by the IT faculty which shows the talent and
                        strengthen the relationship with the industry.</p>
                </div>
                <div class="col-md-6">
                    <img class="" style="width: 100%" src="http://i.imgur.com/R36jNB0.png" alt="">
                </div>
            </div>
            <center style="padding-top: 5%"><a href="#section4"><i class="chevron bottom"></i></a></center>
        </div>

        <div data-aos="fade" style="height: 100vh; display: inline-block">

            <a name="section4"></a>

            <div class="row" style="padding-top: 15%">
                <div class="col-md-6">
                    <img class="" style="width: 100%" src="http://i.imgur.com/VnCY05l.png" alt="">

                    <p>
                        The final year research projects done with the guidance of the best in the field has helped the
                        Undergraduates to come up with groundbreaking research in the areas of Image processing, Natural
                        Language processing and many more.
                    </p>
                </div>
                <div class="col-md-6">
                    <h1 style="text-align: right">PIONEERS</h1>

                    <p style="text-align: right">
                        The IT Faculty undergraduates always stand tall among the rest. Fueled by passion ITFac
                        undergraduates always try to break the trends. In the areas of uniques Hardware projects done in
                        the academics of the first year the undergraduates goes through whole year of planning and using
                        their analytical minds. The projects were success even some of the projects were showcased in
                        the “Dayata Kirula” exhibition several times. The success stories contain several pending
                        patents for their unique ideas too.
                    </p>
                </div>
            </div>
            <center style="padding-top: 5%"><a href="#section5"><i class="chevron bottom"></i></a></center>
        </div>

        <div data-aos="fade" style="height: 100vh; display: inline-block">
            <a name="section5"></a>

            <div class="row" style="padding-top: 15%">
                <div class="col-md-6">
                    <h1>TEAM SPIRIT</h1>

                    <p>
                        Teamwork creates the dream work. The teamwork is not a strange thing for IT Faculty
                        undergraduates. Completing their four years in the university the 12th batch of the Faculty has
                        successfully pioneered in many greater things with the correct guidance and most of all the Team
                        spirit among the batchmates which is in fact a unique factor that distinguishes an IT faculty
                        undergraduate than the rest. Annual Batch Trip which renews the moments to cherish through a
                        lifetime and the activities which build up the team spirit among all the batchmates which takes
                        the mind off from the regular flow of academics.
                    </p>
                </div>
                <div class="col-md-6">
                    <img class="" style="width: 100%; padding-top: 20%" src="http://i.imgur.com/n8aoWoo.png" alt="">
                </div>
            </div>

            <center style="padding-top: 5%"><a href="#section6"><i class="chevron bottom"></i></a>

            </center>

        </div>

        <div data-aos="fade" style="height: 100vh; display: inline-block">
            <a name="section6"></a>
            <div class="row" style="padding-top: 15%">
                <div class="col-md-6">
                    <h1>AESTHETIC</h1>
                    <p>
                        IT Faculty Undergraduates excels not only in technology. The Inaugural Talent Show of the
                        faculty ‘INGENIUM 2015’ was a platform to the students and the staff of the faculty to showcase
                        their hidden talents.
                    </p>
                    <img class="" style="width: 100%; padding-top: 10%" src="http://i.imgur.com/YRIQBGN.png" alt="">
                </div>
                <div class="col-md-6">
                    <img class="" style="width: 100%" src="http://i.imgur.com/7Jgf0Bh.png" alt="">

                    <p style="padding-top: 5%; text-align: right">
                        The show was a success which paved the way for the INGENIUM 2016. The undergraduates were able
                        to show their hidden talents in the areas of dancing, singing and acting.
                    </p>
                </div>
            </div>
            <center style="padding-top: 5%"><a href="#section7"><i class="chevron bottom"></i></a></center>
        </div>

        <div data-aos="fade" style="height: 100vh; display: inline-block">
            <a name="section7"></a>
            <div class="row" style="padding-top: 15%">
                <div class="col-md-6">
                    <img style="width: 100%; padding-top: 10%" src="http://i.imgur.com/q6M2zzS.png" alt="">
                </div>
                <div class="col-md-6">
                    <h1>FAMILY</h1>
                    <p>
                        One Batch, one Family. Through the years Batch 12 of the Faculty of Information Technology has
                        grown its unity, energy and the intellect to perform as one and excel through the academics as
                        well as non academics.
                    </p>
                    <p>
                        They have introduces INGENIUM and succesfully done number of activities together as one
                        throughout their four years in the University.
                    </p>
                </div>
            </div>
            <center style="padding-top: 5%"><a href="#section8"><i class="chevron bottom"></i></a></center>
        </div>

        <div data-aos="fade" style="height: 100vh; display: inline-block">
            <a name="section8"></a>
            <div class="row" style="padding-top: 15%">
                <div class="col-md-6">
                    <h1>HELPING HAND</h1>
                    <p>
                        INTECS continued to do their good work on 2016 starting with Kalyani Maha Vidyalaya for the
                        first Outreach session on 2016. They continues to pave the path for the young minds in
                        Kurunagala and Ruwanwella with the next session of Outreach held in Ruwanwella Rajasinghe
                        Central College and Vihayaba National College.
                    </p>
                </div>
                <div class="col-md-6">
                    <img class="" style="width: 100%" src="http://i.imgur.com/hJudiPz.png" alt="">
                </div>
            </div>
            <center style="padding-top: 5%"><a href="#company"><i class="chevron bottom"></i></a></center>
        </div>

        <section id="sponsors" class="download text-center">
            <div data-aos="flip-right" style="height: 100vh; display: inline-block">
                <a name="company"></a>
                <img class="" style="width: 100%" src="http://i.imgur.com/jpG1XwY.png" alt="">
                <center style="padding-top: 5%"><a href="#end"><i class="chevron bottom"></i></a></center>
            </div>
        </section>

        <div data-aos="fade" style="height: 100vh; display: inline-block">
            <a name="end"></a>
            <div class="row" style="padding-top: 15%"></div>
            <img class="" style="width: 100%" src="http://i.imgur.com/5QudZjc.png" alt="">
            {{--<p>--}}
            {{--Lorem Ipsum is simply dummy text of the printing and typesetting industry. It has survived not only five centuries, it has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.--}}
            {{--</p>--}}
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script src="https://js.pusher.com/4.0/pusher.min.js"></script>
    <script>

        function timeSince(date) {

            var seconds = Math.floor((new Date() - date) / 1000);

            var interval = Math.floor(seconds / 31536000);

            if (interval > 1) {
                return interval + " years ago";
            } else if (interval == 1) {
                return interval + " year ago";
            }
            interval = Math.floor(seconds / 2592000);
            if (interval > 1) {
                return interval + " months ago";
            } else if (interval == 1) {
                return interval + " month ago";
            }
            interval = Math.floor(seconds / 86400);
            if (interval > 1) {
                return interval + " hours ago";
            } else if (interval == 1) {
                return interval + " hour ago";
            }
            interval = Math.floor(seconds / 3600);
            if (interval > 1) {
                return interval + " hours ago";
            } else if (interval == 1) {
                return interval + " hour ago";
            }
            interval = Math.floor(seconds / 60);
            if (interval > 1) {
                return interval + " minutes ago";
            } else if (interval == 1) {
                return interval + " minute ago";
            }
            return "just now";
        }

        function getRandomInt(min, max) {
            min = Math.ceil(min);
            max = Math.floor(max);
            return Math.floor(Math.random() * (max - min)) + min;
        }

        timerefresh();

        var id = {{count($data)}}+1;

        window.Echo.channel('CFSite').listen('.profile_views', function (data) {

            var ago = timeSince(new Date(data.activity.time)); //2017-03-12T17:51:22+00:00

            var view = $("<div class='well well-sm' style='width: 100%; min-height: 60px'>").css("z-index", id)
                    .append($("<img width='30px' height='30px'>").attr('src', '/logo/' + getRandomInt(0, 29) + '.jpg'))
                    .append($("<a target='_blank'></a>").attr('href', '/students/' + data.activity.index + '/false').text(data.activity.name + '\'s')).append(' profile has been viewed')
                    .append($("<br><span class='time-ago'></span>").text(ago))
                    .append("<div style='clear:both'></div>")
                    .append($("<span class='times' hidden></span>").text(data.activity.time));

            $('#views-list').prepend(view.css('opacity', 0)
                    .slideDown('fast')
                    .animate(
                            {opacity: 1},
                            {queue: false, duration: 'slow'}
                    ));
            id++;
        });

        function timerefresh() {
            $('.times').each(function (index, value) {
                newtime = timeSince(new Date($(this).text()));
                agoElement = $(this).prev().prev();
                oldtime = agoElement.text();
                if (newtime !== oldtime) {
                    agoElement.fadeTo(500, 0);
                    agoElement.text(newtime).fadeTo(0, 0).fadeTo(1000, 1);
                }
            });
        }

        AOS.init({
            offset: 200,
            duration: 600,
            easing: 'ease-in-sine',
            delay: 200,
        });

        setInterval(function () {
            timerefresh();
        }, 1000 * 10);

        $("a[href='#home']").click(function () {
            $("html, body").animate({scrollTop: 0}, "slow");
            return false;
        });

    </script>
@endsection
