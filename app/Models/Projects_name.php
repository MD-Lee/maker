<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Projects_name extends Model {
    protected  $table='projects_name';
    public  function  get_project_list(){
        return $this->hasMany('App\Models\Project','pid','id');
    }
}

