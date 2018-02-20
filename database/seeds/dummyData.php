<?php

use Illuminate\Database\Seeder;
use App\Profile;
class dummyData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<50;$i++) {
        	Profile::create(['firstName'=>'first','lastName'=>'last','degree'=>'IT','job_status'=>'available','cv_link'=>'dasdasdas','objective'=>'dsadsadsad','techs'=>'a,b,c,d','user_id'=>5]);
        }
    }
}
