<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class StudentSearchController extends Controller
{
    public function search(Request $request){

            $ids=[];
            $pros = Profile::search($request->get('q'))->get();//paginate(270);

            foreach ($pros as $key => $value) {
                if($value['user']['status']=='active' && substr( $value['user']['name'], 0, 2 ) === "13"){
                    array_push($ids, $value['id']);
                }
            }

        $profile_as = Profile::whereIn('id',$ids)->paginate(270);


        if(!str_contains($request->get('q'),'hired')){
            $profile = $profile_as->sortByDesc(function ($item) {
                return $item->job_status== 'hired'? false:true;
            })->values();
        }else{
            $profile = $profile_as->sortByDesc(function ($item) {
                return $item->job_status== 'hired'? true:false;
            })->values();
        }

        return response()->json($profile);

    }

    public function search_1(Request $request){

            $ids=[];
            $pros = Profile::search($request->get('q'))->get();//paginate(270);

            foreach ($pros as $key => $value) {
                if($value['user']['status']=='active' && substr( $value['user']['name'], 0, 2 ) === "12"){
                    array_push($ids, $value['id']);
                }
            }

        $profile_as = Profile::whereIn('id',$ids)->paginate(270);
         //   $profile_as = Profile::search($request->get('q'))->paginate(270);

        if(!str_contains($request->get('q'),'hired')){
            $profile = $profile_as->sortByDesc(function ($item) {
                return $item->job_status== 'hired'? false:true;
            })->values();
        }else{
            $profile = $profile_as->sortByDesc(function ($item) {
                return $item->job_status== 'hired'? true:false;
            })->values();
        }

        return response()->json($profile);

    }    
}
