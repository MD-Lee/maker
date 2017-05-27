<?php
namespace App\Http\Controllers\Mobile;


use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller{


    public function index(){
        $map['status'] = 1;
        $map['is_deletes'] = 0;
        //$project_info  = Project::where($map)->limit(5)->get();
        $Project = new Project();
        $project_info  = Project::join('projects_name',function ($join){
                                 $join->on('projects.pid', '=', 'projects_name.id');
                            })
                             ->limit(5)
                             ->orderBy('projects.created_at','desc')
                             ->get();

        return view('mobile.index',['project_info'=>$project_info]);

    }

}
