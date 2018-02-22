<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	use Searchable;
    protected $fillable = ['name', 'website', 'logo', 'description','sponsership_type','technologies','available_vacancies','responsibility','salary','status','user_id'];

    public function toSearchableArray()
    {
       	$array = $this->toArray();
       	if(count($this->vacancies->toArray())>0){
	       	$array['vacancies']="";
	       	$array['techs']="";
	        foreach ($this->vacancies->toArray() as $key => $value) {
	        	$array['vacancies']=$array['vacancies']." ".$value["name"];
	        	$array['tecs']=$array['techs']." ".$value["techs"];
	        }       		
       	}
        return $array;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function vacancies()
    {
    	return $this->hasMany('App\Vacancy');
    }
}
