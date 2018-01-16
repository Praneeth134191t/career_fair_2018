<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class indexController extends Controller
{
    public function index(){

//        $last_activity = Activity::inLog('profile_view')->get()->last();
//        $profile = $last_activity->causer;
//        $img = $profile->user->name . '.jpg';
//        $this->activity = array(
//            "time" => $last_activity->created_at->toW3cString(),
//            "name" => $profile->firstName. ' ' . $profile->lastName,
//            "img" => $img
//        );

        $data = Activity::inLog('profile_view')->orderBy('created_at','desc')->paginate(30);


        return view('welcome',['data'=>$data]);
    }
}
