<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Project extends Model {
    protected $fillable = ['product_name','mid','pid','profit_description',
                           'content','customer','problems','profit_point',
                           'product_profit','train_methods','train_start_time','content',
                           'train_end_time','area','address',
                            ];
   // protected  $table='projects';
    /*项目列表*/
    public  function  get_project_name(){
    return $this->hasOne('App\Models\Projects_name','id','pid');
    }
}

