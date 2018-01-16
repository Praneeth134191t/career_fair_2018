<?php
/**
 * Created by PhpStorm.
 * User: Nimesha Jinarajadasa
 * Date: 3/4/2017
 * Time: 8:32 PM
 */

namespace App\Http\Controllers;


use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class UserController extends Controller{

    public function getAddUserProfileDetails()
    {
        $files = File::allFiles(public_path().'/profilepics/');

        $thumbs = [];
        foreach ($files as $file) {
            $filename = $file->getFilename();
            if(substr( $filename, 0, 3 ) === "TN_" || substr( $filename, 0, 3 ) === "DF_"){
                array_push($thumbs,$file->getFilename());
            }
        }

        $thumbs = array_values(array_sort($thumbs, function ($value) {
            return $value;
        }));

        return view('user-profile.add_user_profile_details',['thumbs'=>$thumbs]);
    }

    public function getEditProfileDetails(){
        $files = File::allFiles(public_path().'/profilepics/');

        $thumbs = [];
        foreach ($files as $file) {
            $filename = $file->getFilename();
            if(substr( $filename, 0, 3 ) === "TN_" || substr( $filename, 0, 3 ) === "DF_"){
                array_push($thumbs,$file->getFilename());
            }
        }
        $thumbs = array_values(array_sort($thumbs, function ($value) {
            return $value;
        }));

        $profile = Auth::user()->profile;
        return view('user-profile.edit_user_profile_details',['thumbs'=>$thumbs,'profile'=>$profile]);
    }

    public function postAddUserProfileDetails(Request $request)
    {

        $messages = [
            'active_url' => ':attribute url is not a valid URL. (ex: http://www.linkedin.com/in/username)',
        ];

        $this->validate($request,[
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required',
            'linkedin' => 'active_url',
            'cv_link' =>  'required|active_url',
            'objective' => 'required|min:50|max:500',
            'techskills' => 'required',
            'job_status' => 'required|in:available,hired'
        ],$messages);

        $firstName = $request['firstName'];
        $lastName = $request['lastName'];
        $phone = $request['phone'];
        $linkedin = $request['linkedin'];
        $objective = $request['objective'];
        $techskills = $request['techskills'];
        $degree = $request['degree'];
        $userId = Auth::user()->id;

        if(Auth::user()->profile){
            $profile = Auth::user()->profile;
        }else{
            $profile = new Profile();
        }
        $profile->firstName = $firstName;
        $profile->lastName = $lastName;
        $profile->profile_img = $request['profile_img'];
        $profile->phone = $phone;
        $profile->linkedinLink = $linkedin;
        $profile->degree = $degree;
        $profile->objective = $objective;
        $profile->techs = $techskills;
        $profile->user_id = $userId;
        $profile->cv_link = $request['cv_link'];
        $profile->job_status = $request['job_status'];

        if(!Auth::user()->profile){
            $profile->user()->associate(Auth::user());
        }

        $profile->save();

        return redirect()->route('home',['profileDetails'=> $profile]);
    }

    public function getUserImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file,200);
    }

    public function getUserCV($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file,200);
    }

    public function upload(Request $request)
    {
        //$uniqueFileName = uniqid() . $request->get('upload_file')->getClientOriginalName() . '.' . $request->get('upload_file')->getClientOriginalExtension());

        $request->get('profile_img')->move(public_path('cvs') . Auth::user()->name.'.pdf');

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }

    public function postEditProfile(Request $request)
    {
        $this->validate($request,[
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required',
            'linkedin' => 'active_url',
            'cv_link' =>  'required|active_url',
            'objective' => 'required|min:50|max:500',
            'techskills' => 'required',
            'job_status' => 'required|in:available,hired'
        ]);

        $authenticatedUserID = Auth::user()->id;
        $profileOwnedUser = User::find($authenticatedUserID);
        $profile = $profileOwnedUser->profile;

        $profile->firstName = $request['firstName'];
        $profile->lastName = $request['lastName'];
        $profile->phone = $request['phone'];
        $profile->degree = $request['degree'];
        $profile->linkedinLink = $request['linkedin'];
        $profile->objective = $request['objective'];
        $profile->techs = $request['techskills'];
        $profile->job_status = $request['job_status'];

        $profile->update();
        return response()->json(['firstName' => $profile->firstName, 'lastName'=> $profile->lastName, 'phone'=>$profile->phone,
        'degree'=> $profile->degree, 'linkedin'=>$profile->linkedinLink, 'objective'=> $profile->objective, 'techs'=>$profile->techs],200);
//        if(Auth::user()!= $post->user)
//        {
//            return redirect()->back();
//        }
//        $post->body = $request['body'];
//        $post->update();
//        return response()->json(['new_body'=> $post->body],200);
    }
}