<?php
namespace App\Http\Controllers\Mobile;


use App\Http\Controllers\Controller;

class ProjectController extends Controller{

    public function project_lists(){

        return view('mobile.project.project_lists');

    }

    public function project_details(){

        return view('mobile.project.project_details');

    }


}
