<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class AuditingController extends Controller{

    /* name :报备审核*/
    public function report(){

        return view('admin.auditing.report');

    }
    /* name :报备详情*/
    public function report_details(){

        return view('admin.auditing.report_details');

    }
    /* name :回款审核*/
    public function payment(){

        return view('admin.auditing.payment');

    }
    /* name :添加线下回款*/
    public function add_payment(){

        return view('admin.auditing.add_payment');

    }

    /* name :分润审核*/
    public function profit(){

        return view('admin.auditing.profit');

    }




}