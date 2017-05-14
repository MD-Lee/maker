<?php
namespace App\Http\Controllers\Mobile;


use App\Http\Controllers\Controller;

class ResourcesController extends Controller{

    public function resources_list(){

        return view('mobile.resources.resources_list');

    }

    public function resources_add(){

        return view('mobile.resources.resources_add');

    }


}