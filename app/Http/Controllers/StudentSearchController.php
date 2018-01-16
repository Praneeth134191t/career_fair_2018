<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class StudentSearchController extends Controller
{
    public function search(Request $request){

        $profile_as = Profile::search($request->get('q'))->paginate(270);


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
