	<div id="student_modal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title text-center" style="padding: 10px">{{$profileDetails->firstName}} {{$profileDetails->lastName}}</h3>
				</div>
				<div class="modal-body">
					<div class="row">
						@if(substr($profileDetails->index, 0, 2) === "12")
							<div class="col-lg-5"><img class="img-responsive" src="/profilepics/{{$profileDetails->profile_img}}" alt=""></div>
						@else
							<div class="col-lg-5"><img class="img-responsive" src="/profilepics_13_2/{{$profileDetails->profile_img}}" alt=""></div>	
						@endif	
						<div class="col-lg-7">

							<h4>
								{{$profileDetails->objective}}</h4>
							<h4>
								@foreach(explode(",", $profileDetails->techs) as $tech)
                                    <span class="label label-default skills">{{$tech}}</span>
                                @endforeach
							</h4>
							<br>
							<h4>Mobile Number : {{$profileDetails->phone}}</h4>
                            <!-- <h4>Email : usbgalle@gmail.com</h4> -->
                            <h4>Degree Program : {{$profileDetails->degree}}</h4>
                            <a  style="text-decoration: none;background-color: #D3D3D3;color: black" class="cv-btn" href="{{ $profileDetails->linkedinLink  }}" target="_blank">LinkedIn Account</a>
                            <a class="cv-btn" href="{{ $profileDetails->cv_link  }}" target="_blank" style="text-decoration: none;background-color: #D3D3D3;color: black">View CV</a>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>