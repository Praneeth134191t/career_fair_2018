<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = ['name','techs','responsibility','salary','company_id'];

     public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
