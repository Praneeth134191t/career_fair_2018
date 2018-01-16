<?php

namespace App\Http\Controllers;

use App\Company;
use App\Profile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Schema;

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
        $company = Company::create($request->all());
        return redirect(route('admin.companiesPage'));
    }

    public function deleteCompany($id){
        $com = Company::find($id)->delete();
        return redirect()->back();
    }

}
