<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Profile extends Model
{

    use Searchable;

    protected $appends = ["index"];

    protected $fillable = ['firstName', 'lastName', 'phone', 'degree','job_status','linkedinLink','profile_img','user_id','objective','techs'];

    public function getIndexAttribute()
    {
        return $this->user->name;
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
        
        $array["index"] = $this->user->name;
        

        unset($array["user"]);


        return $array;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
