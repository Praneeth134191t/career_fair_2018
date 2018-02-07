<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'website', 'logo', 'description','sponsership_type','technologies','available_vacancies','responsibility','salary','status','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function vacancies()
    {
    	return $this->hasMany('App\Vacancy');
    }
}
