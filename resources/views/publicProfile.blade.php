<style>
    .image-container {
        position: relative;
        width: 200px;
        height: 300px;
    }
    .image-container .after {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: no-repeat center url('/img/hired.png')
    }
    .image-container:hover .after {
        display: block;
        opacity: 0.3;
    }
</style>
<div class="container-fluid std_more">
    <div class="row" style="border:solid #ddd 2px; padding-left: 5px; padding-top: 18px; padding-bottom: 18px">
        @if($profileDetails)
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <div class="row" style="margin-left: 10px;">
                        </div>
                        <div>
                            <div class="panel-body image-container" style="width: 100%; height: 0; padding-bottom: 100%; overflow: hidden; display: table-row">
                                    <img src="/profilepics/{{$profileDetails->profile_img}}" alt="" class="img-responsive">
                                    <div style="{{$profileDetails->job_status!=="hired"? 'display:none':''}}" class="after"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7 col-md-offset-1">
                        <div style="margin: 20px; padding: 5px;">

                            <a style="display: inline-block" class="btn btn-raised btn-sm" target="_blank" href="{{ $profileDetails->cv_link  }}"><span style="vertical-align: middle;">View PDF CV </span><i style="color: darkred; vertical-align: middle;" class="fa fa-2x fa-file-pdf-o"></i></a>
                            <br>
                            <br>
                            <a style="display: inline-block" class="btn btn-raised btn-sm" target="_blank" href="{{ $profileDetails->linkedinLink  }}"><span style="vertical-align: middle;">View LinkedIn Profile </span><i style="color: black; vertical-align: middle;" class="fa fa-2x fa-linkedin-square"></i></a>
                            <br>
                            <br>
                            <div><strong>Contact: </strong></div> <p style="font-size: 1em" id="phone">{{ $profileDetails->phone }}</p>
                                <div><strong>Degree: </strong></div> <p style="font-size: 1em" id="degree">{{ $profileDetails->degree }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <p><strong>Profile</strong></p>
                    <p class="text-justify" style="font-size: 1em" id="objective">{{ $profileDetails->objective }}</p>
                </div>
            </div>
        </div>
        @else
            <h3>Details not available !</h3>
        @endif
    </div>
</div>