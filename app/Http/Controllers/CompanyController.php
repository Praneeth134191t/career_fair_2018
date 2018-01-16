<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(){
        $data = Company::paginate(10);
        return view('companies',['companies'=> $data]);
    }
}
