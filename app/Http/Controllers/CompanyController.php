<?php

namespace App\Http\Controllers;

use App\Company;
use App\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class CompanyController extends Controller
{
    public function index(){
        $data = Company::where('status','active')->paginate(10);
        return view('companies_new',['companies'=> $data]);
    }

    public function getEditCompanyDetails(){

        $company = Auth::User()->company;
        return view('company-profile.edit_company_profile_details',['company'=>$company]);
    }

    public function postEditCompanyDetails(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'description' => 'required|min:50|max:500'
        ]);     
        $company = Auth::User()->company;
        $company->update(['name'=>$request->name,'status'=>'active','description'=>$request->description]);
        return redirect()->route('company.details')->with('update',['Password has been changed successfully']);
    }
    public function getChangePassword()
    {
        $name=Auth::user()->company->name;
        return view('company-profile.set-password',['name'=>$name]);
    }        

    public function setPassword(Request $request){
		$user = Auth::user();
        $this->validate($request,[
            'password' => 'required|min:6|max:255|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user->password = bcrypt($request->get('password'));
        $user->status = 'active';

        $user->save();

        activity('set_password')
            ->causedBy($user)
            ->log($user->name.' has set the password !');

        $company=$user->company;
        return redirect()->route('company.edit_details')->with('pw_succss',['Password has been changed successfully']);
    }

    public function viewCompany($id, Request $request){

        $company=Company::find($id);

        return view('company-profile.summary',["company"=>$company]);
    }

    public function getCompanyDetails()
    {
        $company = Auth::User()->company;
        return view('company-profile.company_profile_details',['company'=>$company]);
    }

    public function getCompanyDetailsById($id)
    {
        $vacancy = Vacancy::find($id);
        return view('company-vacancies',['vacancy'=>$vacancy]);
    }
    public function getAddVacancy()
    {
        //$vacancies = Auth::User()->company()->vacancies;
        return view('company-profile.add_vacancies');
    }

    public function postAddVacancy(Request $request)
    {
        $this->validate($request,[
            'job_title' => 'required',
            'technologies' => 'required',
            'responsibility'=>'required|min:20|max:500',
        ]);

        $company = Auth::User()->company;
        $vacancy = new Vacancy();

        $vacancy->name=$request->job_title;
        $vacancy->techs=$request->technologies;
        $vacancy->responsibility=$request->responsibility;
        $vacancy->company_id=$company->id;
        $vacancy->salary=$request->salary;
        
        $vacancy->save();
        return redirect()->route('company.details')->with('vac_add',['Password has been changed successfully']);;

    }
    public function postUpdateVacancy(Request $request,$id)
    {
        $this->validate($request,[
            'job_title' => 'required',
            'technologies' => 'required',
            'responsibility'=>'required|min:20|max:500',
        ]);
        $vacancy=Vacancy::where('id',$id)->first();
        
        if(!$vacancy || Auth::User()->company->id != $vacancy->company->id){
            return redirect()->route('company.details')->with('err',['Password has been changed successfully']);
        }
        $vacancy->update(['name'=>$request->job_title,'techs'=>$request->technologies,'responsibility'=>$request->responsibility,'salary'=>$request->salary]);
      
        return redirect()->route('company.details')->with('update',['Password has been changed successfully']);

    }
    public function getUpdateVacancy($id)
    {

        $vacancy=Vacancy::where('id',$id)->first();
        
        if(!$vacancy || Auth::User()->company->id != $vacancy->company->id){
            return redirect()->route('company.details')->with('err',['Password has been changed successfully']);
        }
        return view('company-profile.edit_vacancy',['vacancy' => $vacancy]);

    }

    public function deleteVacancy($id)
    {

        $vacancy=Vacancy::where('id',$id)->first();
        
        if(!$vacancy || Auth::User()->company->id != $vacancy->company->id){
            return redirect()->route('company.details')->with('err',['Password has been changed successfully']);
        }
        $vacancy->delete();
      
        return redirect()->route('company.details')->with('vac_del',['Password has been changed successfully']);

    }    


}
