<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Resource extends Model {

    protected $fillable = ['mid','resource_name','type'];
    public function get_user_info(){
        return $this->hasOne('App\Models\Members','id','mid');
    }

}

