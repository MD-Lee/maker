<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class ProjectController extends Controller{

    public function index(){

        return view('admin.project.project');

    }
    public function project_details(){

        return view('admin.project.project_details');

    }


}