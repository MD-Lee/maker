<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Projects_report extends Model {
    protected  $table='projects_report';
    protected $fillable = ['pid','mid','customer_name',
        'customer_area','customer_address','customer_require','status',
        'amount','agreement_doc'
    ];

}

