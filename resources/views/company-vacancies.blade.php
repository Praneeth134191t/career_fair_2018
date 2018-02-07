    <div id="student_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title text-center" style="padding: 10px">{{$vacancy->company->name}} - {{$vacancy->name}}</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4 col-md-4" style="text-align: left;font-weight: bold"> Responsibility :</div>
                        <div class="col-lg-8 col-md-8">{{$vacancy->responsibility}}</div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4 col-md-4" style="text-align: left;font-weight: bold"> Technical Skills:</div>
                        <div class="col-lg-8 col-md-8">@foreach(explode(",", $vacancy->techs) as $tech)
                                    <span class="label label-default skills">{{$tech}}</span>
                                @endforeach</div>
                    </div>
                    <br>
                    @if(!is_null($vacancy->salary))
                    <div class="row">
                        <div class="col-lg-4 col-md-4" style="text-align: left;font-weight: bold"> Salary :</div>
                        <div class="col-lg-8 col-md-8">{{$vacancy->salary}}</div>
                    </div>
                    <br>
                    @endif
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>