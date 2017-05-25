<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Projects_report extends Model {
    protected  $table='projects_report';
    protected $fillable = ['pid','mid','customer_name',
        'customer_area','customer_address','customer_require','status',
        'amount','agreement_doc'
    ];
    public function get_project_info(){
        return $this->hasOne('App\Models\Perject','id','pid');
    }
}

