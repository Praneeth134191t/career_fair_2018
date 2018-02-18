@extends('layouts.new_master')
@section('header')

@endsection

@section('content')
    <section id="fh5co-explore" data-section="">
        <div class="fh5co-explore fh5co-explore-bg-color">
            @if (session()->has('vac_add'))
                                <h3 class="text-center" style="color: green">New Vacancy has been added successfully</h3>
            @endif
            @if (session()->has('update'))
                                <h3 class="text-center" style="color: green">Successfully Updated</h3>
            @endif
            @if (session()->has('vac_del'))
                                <h3 class="text-center" style="color: green">Vacancy has been deleted successfully</h3>
            @endif
            @if (session()->has('err'))
                                <h3 class="text-center" style="color: red">Something went wrong. Try Again</h3>
            @endif
            <div class="container to-animate">
                        <div class="container">
                        <div class="list-item to-animate center-block" style="max-width: 1000px;align-content: center; margin: 0 auto;">
                            <div class="row">
                                <br>
                                <h3 class="text-center"> {{$company->name}}</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="add_image">
                                            <img src="{{$company->logo}}" alt="Avatar" class="img-responsive center-block" style="width: 200px">
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-4">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4" style="text-align: left;font-weight: bold"> Company Name</div>
                                            <div class="col-lg-8 col-md-8" style="text-align: left">  {{$company->name}}</div>
                                        </div>
                                        <div class="row">
                                            <br>
                                            <div class="col-lg-4 col-md-4" style="text-align: left;font-weight: bold"> Company Description </div>
                                            <div class="col-lg-8 col-md-8" style="text-align: left"> {{$company->description}} </div>
                                        </div>
                                        <br>
                                        <form action="{{route('company.edit_details')}}" method="get"> 
                                        <button class="login-btn center-block">Edit</button>
                                        </form>
                                        <hr>
                                    </div>
                                    <h3 class="text-center"> Available Vacancies</h3>
                                    @if(count($company->vacancies)==0)
                                    <h4 class="text-center">No vacancies</h4>
                                    @elseif(count($company->vacancies)==1)
                                    <h4 class="text-center">There is {{count($company->vacancies)}} vacancy</h4>
                                    @else
                                    <h4 class="text-center">There are {{count($company->vacancies)}} vacancies</h4>
                                    @endif
                                    <form action="{{route('company.getAddVacancies')}}" method="get">
                                    <button class="login-btn center-block" type="submit"> <span class="glyphicon glyphicon-plus"></span>Add vacancies</button>
                                    </form>
                                    <hr>
                                    @if(count($company->vacancies)>0)
                                    <div class="center-block">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <!-- Nav tabs --><div class="card">
                                                    <ul class="nav nav-tabs" role="tablist">
                                                        @foreach($company->vacancies as $key => $vac)
                                                        <li class="{{$key==0?'active':''}}"><a href="#{{$vac->id}}" aria-controls="{{$vac->id}}" role="tab" data-toggle="tab">{{$vac->name}}</a></li>
                                                        @endforeach
                                                    </ul>

                                                    <!-- Tab panes -->
                                                    <div class="tab-content">
                                                        @foreach($company->vacancies as $key => $vac)
                                                        <div role="tabpanel" class="tab-pane {{$key==0?'active':''}}" id="{{$vac->id}}">
                                                            <div class="row">
                                                                <div class="col-lg-4 col-md-4" style="text-align: left;font-weight: bold"> Job Title:</div>
                                                                <div class="col-lg-8 col-md-8">{{$vac->name}}</div>
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col-lg-4 col-md-4" style="text-align: left;font-weight: bold"> Responsibilities:</div>
                                                                <div class="col-lg-8 col-md-8">{{$vac->responsibility}}</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-4 col-md-4" style="text-align: left;font-weight: bold"> Salary:</div>
                                                                <div class="col-lg-8 col-md-8">{{is_null($vac->salary)?'No Added':$vac->salary}}</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-4 col-md-4" style="text-align: left;font-weight: bold"> Technologies:</div>
                                                                <div class="col-lg-8 col-md-8">
                                                                @foreach(explode(",", $vac->techs) as $val => $tech)
                                                                
                                                                {{$val!=0?',':''}}{{$tech}} 
                                                                 
                                                                @endforeach 
                                                                </div>

                                                            </div>
                                                            <div class="row"">
                                                            <div class="col-lg-6 col-md-6"></div> 
                                                            <div class="col-lg-3 col-md-3">
                                                                <form method="get" action="{{route('company.getUpdateVacancies',[$vac->id])}}">
                                                                <button class="login-btn center-block" type="submit">Update</button>
                                                                </form>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3">
                                                                <form method="post" action="{{route('company.deleteVacancy',[$vac->id])}}">
                                                            <button class="login-btn center-block" type="submit">Delete</button>
                                                            <input type="hidden" name="_token" value="{{Session::token()}}">
                                                        </form> 
                                                            </div>
                                                            </div>   
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                </div>


                            </div>


                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
@section('scr')
@endsection