<?php
namespace App\Http\Controllers\Mobile;


use App\Http\Controllers\Controller;

class CourcesController extends Controller{

    public function cources_lists(){

        return view('mobile.cources.cources_list');

    }



}