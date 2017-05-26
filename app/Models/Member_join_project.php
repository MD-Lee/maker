<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Member_join_project extends Model {
   // protected  $table='members';
    public function get_user_info(){
       return $this->hasOne('App\Models\Members','id','mid');
    }
}

