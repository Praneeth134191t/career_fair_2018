<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\User;

class AddUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$file=File::get(public_path('IT.txt'));
    	$dta=explode(',', $file);
    	foreach ($dta as $key => $value) {
    		User::create(['name'=>$value,'email'=>null,'password'=>bcrypt($value),'status'=>'first_time','role'=>'student']);
    	}
    	$file=File::get(public_path('ITM.txt'));
    	$dta=explode(',', $file);
    	foreach ($dta as $key => $value) {
    		User::create(['name'=>$value,'email'=>null,'password'=>bcrypt($value),'status'=>'first_time','role'=>'student']);
    	}
    }
}
