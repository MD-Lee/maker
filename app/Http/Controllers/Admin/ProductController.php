<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class ProductController extends Controller{

    public function lists(){

        return view('admin.product.lists');

    }
    public function product_details(){

        return view('admin.product.product_details');

    }
    public function product_in(){

        return view('admin.product.product_in');

    }


}