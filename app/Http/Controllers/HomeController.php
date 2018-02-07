<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Auth::user()->role);
        if(Auth::user()->status == 'first_time' && Auth::user()->role == 'company'){
            return redirect(route('get_change_company_password'));
        }
        elseif(Auth::user()->role == 'company' && Auth::user()->company->status=='deactive'){
            return redirect(route('company.edit_details'));
        }
        elseif(Auth::user()->role == 'company'){
            return redirect(route('company.details'));
        }
        elseif(Auth::user()->role == 'admin'){
            return redirect(route('admin.dashboard'));
        }    
        $profile = Auth::user()->profile;
        if(is_null($profile)){
            return redirect(route('addProfileDetails'));
        }
        return view('home',["profileDetails"=>$profile]);
    }
}
