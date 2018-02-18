<?php

namespace App\Http\Controllers;

use App\Company;
use App\Profile;
use App\User;
use App\Vacancy;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function exportProfileData(){
        $table = Profile::all();
        $filename = "../profile.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, Schema::getColumnListing('profiles'));

        foreach($table as $row) {
            fputcsv($handle, array_values($row->toArray()));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );
        $dateTime = Carbon::now()->toDateTimeString();
        return Response::download($filename, "profile_". $dateTime .".csv", $headers);
    }

    public function companiesPage(){
        $data = Company::orderBy('created_at','desc')->paginate(5);
        return view('admin.companiesPage',['companies' => $data]);
    }

    public function addCompany(Request $request){


        $this->validate($request,[
            'name' => 'required|unique:companies',
            'user_name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:6',
            'website' =>  'required|unique:companies',
            'sponsership_type' => 'required'
        ]);
        $logo=$request->logo;
        if(is_null($request->logo)){
            $logo="http://intecs.itfac.mrt.ac.lk/com_images/default.png";
        }
        else{
            $logo=$request->logo;
        }
        
        $user=User::create(['name'=>$request->user_name,'email'=>$request->email,'password'=>bcrypt($request->password),'status'=>'first_time','role'=>'company']);
        $company = $user->company()->create(['name'=>$request->name,'website'=>$request->website,'logo'=>$logo,'description'=>$request->description]);
        return redirect(route('admin.companiesPage'));
    }

    public function deleteCompany($id){
        $com = Company::find($id)->user()->delete();
        $com = Company::find($id)->delete();
        Vacancy::where('company_id',$id)->delete();
        return redirect()->back();
    }
    public function deleteUser($id){
        $com = Profile::find($id)->delete();
        return redirect()->back();
    }

    public function resetChangePassword($id){
        $user=User::find($id);
        $user->update(['password'=>bcrypt($user->name)]);
        return redirect()->back();
    }
    public function studentsPage(){
        $data = Profile::whereIn('user_id',User::where([['name','like','13%'],['role','student']])->pluck('id')->toArray())->paginate(10);
        return view('admin.studentsPage',['students' => $data]);
    }

    public function getEditStudent($id){
        
        if(substr(User::find($id)->name, 0, 2 ) === "12"){
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
        }
        if(substr(User::find($id)->name, 0, 2 ) === "13")
        {
            $thumbs=File::exists(public_path().'/profilepics_13/'.User::find($id)->name.'.jpg')?User::find($id)->name.'.jpg':'default.jpg';
        } 

        $profile = User::find($id)->profile;
        return view('admin.editStudent',['thumbs'=>$thumbs,'profile'=>$profile]);
    }

    public function getEditCompany($id){
        $company=Company::find($id);
        return view('admin.editCompany',['company'=>$company]);
    }    
    public function editCompany(Request $request,$id){
        $this->validate($request,[
            'name' => 'required',
            'logo' => 'required',
            'website' => 'required',
            'sponsership_type' => 'required'
        ]);
        Company::find($id)->update($request->all());

        return redirect(route('admin.companiesPage'));
    }
    public function addStudent(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:users'
        ]);

        
        $user=User::create(['name'=>$request->name,'email'=>null,'password'=>bcrypt($request->name),'role'=>'student']);
        return redirect(route('admin.studentsPage'));
    }

    public function editStudent(Request $request,$id){
        $messages = [
            'active_url' => ':attribute url is not a valid URL. (ex: http://www.linkedin.com/in/username)',
        ];

        $this->validate($request,[
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required',
            'email' => 'email|required',
            'linkedin' => 'required',
            'cv_link' =>  'required',
            'objective' => 'required|min:50|max:500',
            'techskills' => 'required',
            'job_status' => 'required|in:available,hired'
        ],$messages);

        Profile::find($id)->user->profile->update([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'phone' => $request->phone,
            'email' => $request->email,
            'linkedinLink' => $request->linkedin,
            'cv_link' =>  $request->cv_link,
            'objective' => $request->objective,
            'techs' => $request->techskills,
            'job_status' => $request->job_status,
            'status'=>'active'
        ]);

        return redirect(route('admin.studentsPage'));
        
        
    }


}
