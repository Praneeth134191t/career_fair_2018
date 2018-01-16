<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;

class RegisterStudentController extends Controller
{
    public function update(Request $request){
        $user = Auth::user();

        $validator =  Validator::make($request->all(), [
            'index' => 'regex:/^\d{6}\w$/',
            'password' => 'required|min:6|max:255|confirmed',
            'password_confirmation' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('register'))
                ->withErrors($validator)
                ->withInput();
        }

        $user->name = $request->get('index');
        $user->password = bcrypt($request->get('password'));
        $user->status = 'active';

        $user->save();

        activity('register')
            ->causedBy($user)
            ->log($user->name.' has registered to the site !');

        $profileDetails = $user->profile;
        return redirect()->route('home',["profileDetails"=>$profileDetails ]);
    }
}
