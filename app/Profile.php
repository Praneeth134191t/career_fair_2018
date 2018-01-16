<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Profile extends Model
{

    use Searchable;

    protected $appends = ["index"];

    public function getIndexAttribute()
    {
        return $this->user->name;
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $array["index"] = $this->user->name;
        // Customize array...

        unset($array["user"]);


        return $array;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
