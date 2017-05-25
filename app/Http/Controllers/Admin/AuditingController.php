<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Members;
use App\Models\Project;
use App\Models\Projects_follow;
use App\Models\Projects_name;
use App\Models\Projects_report;
use App\Models\Withdraw_cash;
use Illuminate\Http\Request;

class AuditingController extends Controller{

    /* name :报备审核*/
    public function report(){
        $projects_report = Projects_report::get();
        foreach ($projects_report as & $item) {
           $item['uname'] =  Members::where('id',$item->mid)->value('uname');
           $project_info = Project::where('id',$item->id)->select('product_name','pid')->first();
           $item['pname'] = Project::find($project_info->pid)->get_project_name()->value('pname');
           $item['product_name'] = $project_info->product_name;
            $item['status'] = $item['status'] ==1?'已合作':'未合作';
        }

        return view('admin.auditing.report',['projects_report'=>$projects_report]);

    }
    /* name :报备详情*/
    public function report_details(Request $request ,$t=''){
        $id = $request->id;
        $report_info = Projects_report::where('id',$id)->first();
        $Project_info = Project::where('id',$report_info->pid)->first();
        $report_info->product_name = $Project_info->product_name;
        $report_info->pname = Projects_name::where('id',  $Project_info->pid)->value('pname');
        $report_pstatus = config('person.report_pstatus');
        $report_info->pstatus = $report_pstatus[$report_info->pstatus];
        $follow_info =  Projects_follow::select('content')->where('pid',$report_info->pid)->latest()->first();
        $report_info->follow = $follow_info->content;
        $follow_infos =  Projects_follow::select('content')->where('pid',$report_info->pid)->get();
        $t = $request->t?1:'';//1回款详情 ‘’报备详情


        return view('admin.auditing.report_details',['report_info'=>$report_info,'follow_infos'=>$follow_infos,'t'=>$t]);

    }
    /* name :报备删除*/
    public function del_report(Request $request){
        $id = $request->id;
        $res = Projects_report::where('id',$id)->delete();

        $result['error']= $res?1:2;
        return response()->json($result);


    }
    /* name :回款审核*/
    public function payment(){
        $project_report = Projects_report::where('status',1)->get();
        foreach ($project_report as & $item) {
            $Project_info = Project::where('id',$item->pid)->first();
            $item['product_name'] = $Project_info->product_name;
            $item['pname'] = Projects_name::where('id',  $Project_info->pid)->value('pname');
            if($item['bstatus'] == 1){
                $payment_type =  config('person.payment_type');
                $item['pay_method'] = $payment_type[$item->pay_method];
            }else{
                $item['pay_method'] ='';
            }
            $item['bstatus_name'] = $item->bstatus==1?'已回款':'未回款';



        }

        return view('admin.auditing.payment',['project_report'=>$project_report]);

    }
    /* name :添加线下回款*/
    public function add_payment(Request $request,$id=''){
        if($request->isMethod('post')){
           $post_data = $request->only('id','content','bamount','pay_method');
           $id = $post_data['id'];
           $product_profit = Projects_report::find($post_data['id'])->get_project_info()->value('product_profit');
           $post_data['profit'] = $post_data['bamount']*0.01* $product_profit;
           unset($post_data['id']);
           $post_data['bstatus'] = 1;



           $r = Projects_report::where('id',$id)->update($post_data);

        }
        $id = $request->id;
        $amount = Projects_report::where('id',$id)->value('amount');
        $payment_type = config('person.payment_type');
        return view('admin.auditing.add_payment',['id'=>$id,'amount'=>$amount,'payment_type'=>$payment_type]);

    }
public function del_payment(Request $request){
        $id = $request->id;
        $re = Projects_report::where('id',$id)->delete();
        $res['error'] = $re ?1:2;
      return   response()->json($res);
}

    /* name :分润审核*/
    public function profit(){

        $project_report = Projects_report::where('bstatus',1)->get();
        foreach ($project_report as & $item) {
            $Project_info = Project::where('id',$item->pid)->first();
            $item['product_name'] = $Project_info->product_name;
            $item['pname'] = Projects_name::where('id',  $Project_info->pid)->value('pname');
               $report_pstatus =  config('person.report_bstatus');
                $item['report_pstatus'] = $report_pstatus[$item->pstatus];
        }
        return view('admin.auditing.profit',['project_report'=>$project_report]);

    }
    public function profit_send(Request $request){
        $id = $request->id;
        $update['pstatus'] = 1;
        $r1 = Projects_report::where('id',$id)->update($update);
        $profit = Projects_report::where('id',$id)->select('profit','mid')->first();
        $money =  Members::where('id',$profit->mid)->value('money');
        $money = $money+$profit->profit;
        $r2 = Members::where('id',$profit->mid)->update(['money'=>$money]);
        $savedata['mid'] = $profit->mid;
        $savedata['pid'] = $id;
        $savedata['type'] = 1;
        $savedata['money'] = $profit->profit;
        $r3 = Withdraw_cash::create($savedata);
        if($r1 && $r2){
            $res['error'] = 1 ;
        }else{
            if($r1){
                $money = $money-$profit->profit;
                Members::where('id',$profit->mid)->update(['money'=>$money]);
            }else{
                $update['pstatus'] = 2;
                Projects_report::where('id',$id)->update($update);
            }
            $res['error'] = 2 ;
        }

  return response()->json($res);
    }




}