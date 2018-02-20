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
use Illuminate\Support\Facades\File;
use Spatie\Activitylog\Models\Activity;

class StudentController extends Controller
{
    public function index(Request $request){
        if($request->has('q')){
            // return User::where('status','active')->pluck('id')->toArray();
            $ids=[];
            $pros = Profile::search($request->get('q'))->get();//paginate(270);

            foreach ($pros as $key => $value) {
                if($value['user']['status']=='active' && substr( $value['user']['name'], 0, 2 ) === "13"){
                    array_push($ids, $value['id']);
                }
            }
            $profiles = Profile::whereIn('id',$ids)->orderBy('job_status')->orderBy('firstName')->paginate(270);
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
            return view('students-13-new', $page_data);
        }else{
            $profiles = Profile::whereIn('user_id',User::where([['status','active'],['name','like','13%']])->pluck('id')->toArray())->orderBy('job_status')->orderBy('firstName')->paginate(10);
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
            return view('students-13-new', $page_data);
        }
    }

    public function index_1(Request $request){
        if($request->has('q')){
            $ids=[];
            $pros = Profile::search($request->get('q'))->get();//paginate(270);

            foreach ($pros as $key => $value) {
                if($value['user']['status']=='active' && substr( $value['user']['name'], 0, 2 ) === "12"){
                    array_push($ids, $value['id']);
                }
            }
            $profiles = Profile::whereIn('id',$ids)->orderBy('job_status')->orderBy('firstName')->paginate(270);
            
            for($i=0;$i<count($profiles);$i++){
                $profiles[$i]->objective = str_limit($profiles[$i]->objective, $limit = 180, $end = '...');
                $profiles[$i]->img = "/img/student.jpg"; //$faker->imageUrl(50, 50);
                $profiles[$i]->index = $profiles[$i]->user->name;
            }

            $page_data = array(
                'students' => $profiles
            );
            return view('students-12-new', $page_data);
        }else{
            $profiles = Profile::whereIn('user_id',User::where([['status','active'],['name','like','12%']])->pluck('id')->toArray())->orderBy('job_status')->orderBy('firstName')->paginate(10);

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
            return view('students-12-new', $page_data);
        }
    }    

    public function viewStudent($id,$count='true', Request $request){
        $user = User::where('name', $id)->first();
        $profile = $user->profile;
        $profile->index = $user->name;
        if(substr($profile->index, 0, 2) === "12"){
            $profile->profile_img = Str::substr($profile->profile_img,3);
        }
        // if(substr($profile->index, 0, 2) === "13"){
        //     $profile->profile_img = File::exists(public_path().'/profilepics_13_2/'.$profile->profile_img)?$profile->profile_img:'default.jpg';
        // }
        $dt = Carbon::now()->subSeconds(Config::get('app.broadcasting_block_time'));

        $lastFromThisIP = Activity::where('created_at','>=',$dt)->where('description',$request->ip())->where('causer_id',$user->id)->first();

        if(is_null($lastFromThisIP) and $count == 'true'){
            activity('profile_view')
                ->causedBy($profile)
                ->log($request->ip());

            event(new CFActivities());
        }

        return view('publicProfileModal',["profileDetails"=>$profile]);
    }
}
