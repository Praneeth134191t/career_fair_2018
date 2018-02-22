<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class StudentSearchController extends Controller
{
    public function search(Request $request){
        if($request->get('q')=="hired" || $request->get('q')=="hire"){
            $pro=Profile::where('job_status','hired')->orderBy('firstName')->get()->filter(function ($value, $key) {
                return substr( $value['user']['name'], 0, 2 ) === "13";
            });
            return response()->json($pro->values());
        }

        $profile_as = Profile::search($request->get('q'))->paginate(500);
        $profile_as = $profile_as->filter(function ($value, $key) {
                return substr( $value['user']['name'], 0, 2 ) === "13";
            });
        
        if(str_contains($request->get('q'),'hire') || str_contains($request->get('q'),'hired')){
            $profile =$profile_as->sort(function($a, $b) {
                 if($a->firstName === $b->firstName){
                    if($a->job_status === $b->job_status){
                    return 0;
            }
            
            return $a->job_status < $b->job_status ? -1 : 1;
            } 
            return $a->firstName < $b->firstName ? -1 : 1;
            });
            }else{
            $profile =$profile_as->sort(function($a, $b) {
                if($a->job_status === $b->job_status) {
                    if($a->firstName === $b->firstName){
                    return 0;
            }
            return $a->firstName < $b->firstName ? -1 : 1;
        
            } 
            return $a->job_status < $b->job_status ? -1 : 1;
            });
        }
        
        return response()->json($profile->values());

    }

    public function search_1(Request $request){
        if($request->get('q')=="hired" || $request->get('q')=="hire"){
            $pro=Profile::where('job_status','hired')->orderBy('firstName')->get()->filter(function ($value, $key) {
                return substr( $value['user']['name'], 0, 2 ) === "12";
            });
            return response()->json($pro->values());
        }

        $profile_as = Profile::search($request->get('q'))->paginate(500);
        $profile_as = $profile_as->filter(function ($value, $key) {
                return substr( $value['user']['name'], 0, 2 ) === "12";
            });
        
        if(str_contains($request->get('q'),'hire') || str_contains($request->get('q'),'hired')){
            $profile =$profile_as->sort(function($a, $b) {
                 if($a->firstName === $b->firstName){
                    if($a->job_status === $b->job_status){
                    return 0;
            }
            
            return $a->job_status < $b->job_status ? -1 : 1;
            } 
            return $a->firstName < $b->firstName ? -1 : 1;
            });
            }else{
            $profile =$profile_as->sort(function($a, $b) {
                if($a->job_status === $b->job_status) {
                    if($a->firstName === $b->firstName){
                    return 0;
            }
            return $a->firstName < $b->firstName ? -1 : 1;
        
            } 
            return $a->job_status < $b->job_status ? -1 : 1;
            });
        }
        
        return response()->json($profile->values());

    }    
}
