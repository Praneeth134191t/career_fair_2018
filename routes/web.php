<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//TODO: Make this the main route
$this->get('/send_mail','AdminController@sendMails');

// $this->get('/abc_abc', function(){

// $x=File::get(public_path('IT.txt'));
// return explode(',', $x, 2)[0];

// });

$this->get('/', function(){
    return view('intecshome');
});
$this->get('/login', function(){
    return redirect(route('login'));
});


Route::group(['prefix' => 'careers'], function()
{

    $this->get('/', 'indexController@index')->name('root');

    $this->get('/driveLink', function () {
        dd($_GET['link']);
        return view('index');
    })->name('mat');

    $this->get('/students','StudentController@index')->name('students');
    $this->get('/students_1','StudentController@index_1')->name('students_1');
    $this->get('/students/search','StudentSearchController@search')->name('stdSearch');

    $this->get('/students/search_1','StudentSearchController@search_1')->name('stdSearch_1');
    $this->get('/companies','CompanyController@index')->name('companies');
    $this->get('/companies/search','CompanyController@search')->name('comSearch');
    $this->get('/profileimage/{filename}', 'UserController@getUserImage')->name('profile.image');
    $this->get('/cv/{filename}', 'UserController@getUserCV')->name('profile.cv');
    $this->get('/students/{id}/{count?}','StudentController@viewStudent')->name('students_view');
    $this->get('/com/{id}','CompanyController@viewCompany');
    $this->get('/com_vacs/{id}','CompanyController@getCompanyDetailsById')->name('getCompanyDetailsById');

    $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
    $this->post('login', 'Auth\LoginController@login');
    $this->any('logout', 'Auth\LoginController@logout')->name('logout');


// Password Reset Routes...
    $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    $this->post('password/reset', 'Auth\ResetPasswordController@reset');



    $this::get('/home', 'HomeController@index')->name('home');

    // $this::get('/callback/{provider}', 'SocialAuthController@callback');
    // $this::get('/redirect/{provider}', 'SocialAuthController@redirect');


    $this::group(['middleware' => ['auth']], function () {

        // This route group is belongs to admins be careful
        $this::group(['prefix' => 'adm','middleware' => ['isAdmin']], function () {
            $this->get('/','AdminController@index')->name('admin.dashboard');
            $this->get('/companies','AdminController@companiesPage')->name('admin.companiesPage');
            $this->get('/students','AdminController@studentsPage')->name('admin.studentsPage');
            $this->get('/getEditStudent/{id}','AdminController@getEditStudent')->name('admin.getEditStudent');
            $this->post('/editStudent/{id}','AdminController@editStudent')->name('admin.editStudent');
            $this->get('/deleteCom/{id}','AdminController@deleteCompany')->name('admin.deleteCompany');
            $this->get('/deleteUser/{id}','AdminController@deleteUser')->name('admin.deleteUser');
            $this->get('/reserUserPassword/{id}','AdminController@resetChangePassword')->name('admin.reserUserPassword');
            $this->post('/companies','AdminController@addCompany')->name('admin.addNewCompany');
            $this->post('/add_student','AdminController@addStudent')->name('admin.addStudent');
            $this->get('/ex_profiles','AdminController@exportProfileData')->name('admin.exportProfiles');
            $this->get('/getEditCompany/{id}','AdminController@getEditCompany')->name('admin.getEditCompany');
            $this->post('/editCompany/{id}','AdminController@editCompany')->name('admin.editCompany');
            $this->get('register', function () {
                return view('auth.register');
            })->name('register');

            $this->post('register','RegisterStudentController@update')->name('register');

            
        });

        $this::group(['prefix' => 'company','middleware' => ['comUser']], function () {

           $this->get('edit_company_details', 'CompanyController@getEditCompanyDetails')->name('company.edit_details');
           $this->post('edit_company_details', 'CompanyController@postEditCompanyDetails')->name('company.post_edit_details');
           $this->get('company_details', 'CompanyController@getCompanyDetails')->name('company.details');
           $this->get('vacancies', 'CompanyController@getAddVacancy')->name('company.getAddVacancies');
           $this->get('update_vacs/{id}', 'CompanyController@getUpdateVacancy')->name('company.getUpdateVacancies');
           $this->post('vacancies', 'CompanyController@postAddVacancy')->name('company.postAddVacancy');
           $this->post('update_vac/{id}', 'CompanyController@postUpdateVacancy')->name('company.postUpdateVacancy');
           $this->post('delete_vac/{id}', 'CompanyController@deleteVacancy')->name('company.deleteVacancy');
           //$this->get('/company/{id}','CompanyController@viewCompany')->name('company_view');
           $this->get('change_password', 'CompanyController@getChangePassword')->name('get_change_company_password'); 
           $this->post('set_password','CompanyController@setPassword')->name('set_company_password');  
        });
        $this::group(['middleware' => ['hasProfile']], function () {            
            /*
             * User Profile related Routes
             * */

            $this->get('addprofiledetails', 'UserController@getAddUserProfileDetails')->name('addProfileDetails');
            $this->get('editProfile', 'UserController@getEditProfileDetails')->name('getEditProfileDetails');
            $this->post('profiledetails', 'UserController@postAddUserProfileDetails')->name('postProfileDetails');
            $this->post('edit', 'UserController@postEditProfile')->name('profile.edit');
            $this->get('/change_password',function(){
                return view('auth.passwords.change');
            })->name('getChangeProfilePassword');
            $this->post('/change_password','UserController@postChangePassword')->name('postChangeProfilePassword');  
        });     

    }); 

    // Route::get('fire', function () {
    //     event(new \App\Events\CFActivities('Hi there Pusher!'));
    //     return "Event has been sent!";
    // });


    // $this->get('/a',function(){
    //     if(\App\User::find(3)->profile){
    //         dd("qwe");
    //     }else{
    //         dd("asd");
    //     }
    // });


    // $this->get('/test', function () { // for testing purpose
    //     $lastActivity = \Spatie\Activitylog\Models\Activity::all()->last(); //returns the last logged activity
    //     var_dump($lastActivity->causer);
    //     dd(\Spatie\Activitylog\Models\Activity::inLog('register')->get());
    //     dd(\Spatie\Activitylog\Models\Activity::all());
    // })->name('test');
});
