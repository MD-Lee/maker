<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourcesController extends Controller{

    public function cources_list(){

        return view('admin.cources.cources_list');

    }

    public function add_cources(){

        return view('admin.cources.add_cources');

    }
    public function classification_list(){

        return view('admin.cources.classification_list');

    }
    public function add_classification(){

        return view('admin.cources.add_classification');

    }

}