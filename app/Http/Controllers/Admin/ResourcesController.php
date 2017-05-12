<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResourcesController extends Controller{

    public function resources(Request $request){

        return view('admin.resources.index');

    }
    public function add_resources(){

        return view('admin.resources.add_resources');

    }


}