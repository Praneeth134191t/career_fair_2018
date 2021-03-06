<?php

namespace App\Http\Controllers;

use App\Company;
use App\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class CompanyController extends Controller
{
    public function index(Request $request){
        if($request->has('q')){
            // return User::where('status','active')->pluck('id')->toArray();
            $ids=[];
            $pros = Company::search($request->get('q'))->get();//paginate(270);

            foreach ($pros as $key => $value) {
                if($value['status']=='active'){
                    array_push($ids, $value['id']);
                }
            }
        $company = Company::whereIn('id',$ids)->orderBy('name')->paginate(200);
        return view('companies_new',['companies'=> $company]);
        }
        $data = Company::where('status','active')->orderBy('name')->paginate(10);
        return view('companies_new',['companies'=> $data]);
    }

    public function getEditCompanyDetails(){

        $company = Auth::User()->company;
        return view('company-profile.edit_company_profile_details',['company'=>$company]);
    }

    public function postEditCompanyDetails(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'website'=> 'required',
            'description' => 'required|min:50|max:500',
            'input_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3072',
        ]);
        $logo=Auth::User()->company->logo;
        if ($request->hasFile('input_img')) {
            $image = $request->file('input_img');
            $name = str_replace('_', ' ', Auth::User()->name);
            $name = $name.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/com_images');
            $image->move($destinationPath, $name);
            $logo=$request->root().'/com_images/'.$name;
        }     
        $company = Auth::User()->company;
        $company->update(['name'=>$request->name,'status'=>'active','description'=>$request->description, 'logo'=>$logo, 'website'=>$request->website]);
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
            'responsibility'=>'required|min:10|max:500',
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
            'responsibility'=>'required|min:10|max:500',
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
    public function search(Request $request){

        $company = Company::search($request->get('q'))->paginate(200);
        $company = $company->filter(function ($value, $key) {
                return $value['status'] === "active";
            });
        foreach ($company as $key => $value) {
                $company[$key]["vacs"]=Vacancy::where('company_id',$value->id)->select('id','name')->get();
                // $company[$key]["vac_id"]=Vacancy::where('company_id',$value->id)->pluck('name');
            
        }
        $company=$company->sortBy('name');

        return response()->json($company->values());

        }    


}
