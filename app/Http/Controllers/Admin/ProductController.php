<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Member_join_project;
use App\Models\Project;
use App\Models\Projects_report;
use Illuminate\Http\Request;

class ProductController extends Controller{

    public function lists(){
        $map['is_deletes'] = 0;
        $map['status'] = 1;
        $list =  Project::where($map)->get();
        $sum = count($list->toArray());
        foreach ($list as & $v){
            $v->pname =Project::find($v->id)->get_project_name->value('pname');
            $status = config('person.project_status');
            $v->status = $status[$v->status];
        }
        return view('admin.product.lists',['list'=>$list,'sum'=>$sum]);

    }
    public function product_details(){

        return view('admin.product.product_details');

    }
    public function product_in(Request $request){
        $id = $request->id;
        $member_join_project = Member_join_project::where('pid',$id)->get();
        foreach ($member_join_project as & $item) {
            $user_info = Member_join_project::find($item->mid)->get_user_info()->select('uname','mobile')->first();
            $item['uname'] = $user_info->uname;
            $item['mobile'] = $user_info->mobile;
            $map['pid'] = $item->pid;
            $map['mid'] = $item->mid;
           $customer_name =  Projects_report::where($map)->select('customer_name','status')->get();
           if($customer_name->isEmpty()){
               $item['customer_name'] = '';
               $item['status'] = '';
           }else{
               $item['customer_name'] = $customer_name->customer_name;
               $item['status'] = $customer_name->status==1?'已合作':'未合作';
           }

        }

        return view('admin.product.product_in',['member_join_project'=>$member_join_project]);

    }


}