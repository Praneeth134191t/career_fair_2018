<?php

namespace App\Http\Controllers;

use App\Events\CFActivities;
use App\Profile;
use App\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Spatie\Activitylog\Models\Activity;

class StudentController extends Controller
{
    public function index(Request $request){
        if($request->has('q')){
            $profiles = Profile::search($request->get('q'))->paginate(270);

            //TODO: remove after real images are uploaded
            //$faker = Factory::create();
            for($i=0;$i<count($profiles);$i++){
                $profiles[$i]->objective = str_limit($profiles[$i]->objective, $limit = 180, $end = '...');
                $profiles[$i]->img = "/img/student.jpg"; //$faker->imageUrl(50, 50);
                $profiles[$i]->index = $profiles[$i]->user->name;
            }

            $page_data = array(
                'students' => $profiles
            );
            return view('students', $page_data);
        }else{
            $profiles = Profile::orderBy('job_status')->orderBy('firstName')->paginate(10);


            //TODO: remove after real images are uploaded
            //$faker = Factory::create();
            for($i=0;$i<count($profiles);$i++){
                $profiles[$i]->objective = str_limit($profiles[$i]->objective, $limit = 180, $end = '...');
                $profiles[$i]->img = "/img/student.jpg"; //$faker->imageUrl(50, 50);
                $profiles[$i]->index = $profiles[$i]->user->name;
            }

            $page_data = array(
                'students' => $profiles
            );
            return view('students', $page_data);
        }


    }

    public function viewStudent($id,$count='true', Request $request){
        $user = User::where('name', $id)->first();
        $profile = $user->profile;
        $profile->index = $user->name;
        $profile->profile_img = Str::substr($profile->profile_img,3);

        $dt = Carbon::now()->subSeconds(Config::get('app.broadcasting_block_time'));

        $lastFromThisIP = Activity::where('created_at','>=',$dt)->where('description',$request->ip())->where('causer_id',$user->id)->first();

        if(is_null($lastFromThisIP) and $count == 'true'){
            activity('profile_view')
                ->causedBy($profile)
                ->log($request->ip());

            event(new CFActivities());
        }

        return view('publicProfile',["profileDetails"=>$profile]);
    }
}
