<?php
namespace App\Http\Controllers\Mobile;
use App\Models\Member_join_project;
use App\Models\Members;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Projects_follow;
use App\Models\Projects_name;
use App\Models\Projects_report;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;
use EasyWeChat\Foundation\Application;
class MemberController extends Controller{

    public function toRegister(){

        return view('mobile.register');

    }
    public function toLogin(){

        return view('mobile.login');

    }
    /*name  个人中心*/
    public function person_center(){

      /*  $user = session('wechat.oauth_user'); // 拿到授权用户资料
        $openId = $user->id;*/
        $openId = 1;
        $user_info = Members::where('openid',$openId)->select('headimg','money','id')->first();

        session(['user_id' => $user_info->id]);
        return view('mobile.member.person_center',['user_info'=>$user_info]);

    }
    /*name  资料修改*/
    public function user_info(Request $request){

        if ($request->isMethod('post')) {
            $postdata = $request->all();
            $user_id = $request->user_id;
            unset($postdata['_token']);
            unset($postdata['user_id']);
            $members = new Members();
            $members::where('id',$user_id)->update($postdata);
            return redirect('/person_center');
        }
        /*  $user = session('wechat.oauth_user'); // 拿到授权用户资料
            $openId = $user->id;*/
        $openId = 1;
        $user_info = Members::where('openid',$openId)->first();
        return view('mobile.member.user_info',['user_info'=>$user_info]);

    }
    /*name  分润明细*/
    public function user_profit(){
        $user_id = session('user_id');
        $user_profit = Projects_report::where('mid',$user_id)->orderBy('updated_at','desc')->paginate(10);
        foreach ($user_profit as & $v){
           $project_info = Project::where('id',$v->pid)->select('product_name','product_profit')->first();
            $v->product_name = $project_info->product_name;
            $v->product_profit = $project_info->product_profit;
        }

        return view('mobile.member.user_profit',['user_profit'=>$user_profit]);
    }
    /*name  项目建立*/
    public function project_list(Request $request ,$page=''){
        $id = 1;

        $project_list = Project::where('mid',1)->paginate(10);
        foreach ($project_list as &$v){
            $v['pname'] = Projects_name::where(array('mid'=>$v['mid'],'id'=>$v['pid']))
                          ->value('pname') ;
        }
        return view('mobile.member.project_list',['project_list'=>$project_list]);

    }

    /*name  新增(修改)项目建立*/
    public function project_add(Request $request,$id=''){
        if ($request->isMethod('post')) {
            if($request->id){
                $postdata = $request->all();
                unset($postdata['_token']);
                unset($postdata['id']);
                Project::where('id',$request->id)->update($postdata);
                return redirect('/project_list')->withSuccess('修改成功！');
            }else{
                $postdata = $request->all();
                $postdata['mid'] = 2;//当前用户的ID
                $postdata['pid'] = 2;
                unset($postdata['_token']);
                $project = new Project();
                $project->create($postdata) ;
                return redirect('/project_list')->withSuccess('添加成功！');
            }

        }
        $id = $request->id?$request->id:'';
        $project =$id!=''?Project::where('id',$id)->first():'';
        return view('mobile.member.project_add',['project'=>$project,'id'=>$id]);

    }

    /*name  参与的产品*/
    public function user_project(){
        $mid = 1;
        $user_join_projects = Member_join_project::where('mid',$mid)->paginate(1);
        foreach ($user_join_projects as & $v){
            $project_info = Project::where('id',$v['pid'])->select('id','pid','product_name','area','member_number')->first();
            $pnme = Project::find($project_info->pid)->get_project_name()->select('pname')->first();
            $v['pname'] = $pnme->pname;
            $v['number'] = $project_info->member_number;
            $v['area'] = $project_info->area;
            $v['npid'] = $project_info->id;
            $v['product_name'] = $project_info->product_name;
        }

        return view('mobile.member.user_project',['user_join_projects'=>$user_join_projects]);

    }
    /*name  发布的资源*/
    public function user_resources(){

        return view('mobile.member.user_resources');

    }
    /*name  业务报备*/
    public function user_report(){
        $user_projects_report = Projects_report::where('mid',1)->paginate(10);
        foreach ($user_projects_report as & $v){
            $Project_info = Project::where('id',$v['pid'])->first();
            $v['product_name'] = $Project_info->product_name;
            $v['pname'] = Projects_name::where('id',  $Project_info->pid)->value('pname');
            $report_status =config('person.report_status');
            $v['status']= $report_status[$v['status']];
        }
        return view('mobile.member.user_report',['user_report'=>$user_projects_report]);

    }
    /*name  业务报备添加*/
    public function report_add(Request $request){

        if($request->isMethod('post')){
            $postdata = $request->all() ;
            unset($postdata['_token']);
            $postdata['agreement_doc'] = $request->file('doc')->store('avatars');
            $postdata['pid'] = $postdata['id'];
            $postdata['mid'] = 33;
            $rid = $postdata['rid'];
            $project = new Projects_report();
            if($rid){

                unset($postdata['mid']);
                unset($postdata['id']);
                unset($postdata['pid']);
                unset($postdata['content']);
                unset($postdata['rid']);
                unset($postdata['doc']);

                $project->where('id',$rid)->update($postdata);
            }else{

                $project->create($postdata);
            }

            return redirect('/user_report');

        }
        $id = $request->id?$request->id:'';
        $rid = $request->rid?$request->rid:'';
        if($id){
            //业务报备根据项目添加
            $Project = Project::where('id',$id)->select('product_name','pid')->first();
            $product_name = $Project->product_name;
            $pname = Projects_name::where('id',$Project->pid)->value('pname');
            $report_info ='';
            if($rid){
                //业务报备修改
                $report_info = Projects_report::where('id',$rid)->first();

            }
        }else{
            //直接添加
            $product_name = '';
            $pname = '';
            $report_info ='';
        }

        return view('mobile.member.report_add',['id'=>$id,'rid'=>$rid,'report_info'=>$report_info,'pname'=>$pname,'product_name'=>$product_name]);

    }
    /*name  业务报备详情*/
    public function report_details(Request $request){
        $id = $request->id;
        $report_info = Projects_report::where('id',$id)->first();
        $Project_info = Project::where('id',$report_info->pid)->first();
        $report_info->product_name = $Project_info->product_name;
        $report_info->pname = Projects_name::where('id',  $Project_info->pid)->value('pname');
        $report_pstatus = config('person.report_pstatus');
        $report_info->pstatus = $report_pstatus[$report_info->pstatus];
        $follow_info =  Projects_follow::select('content')->where('pid',$report_info->pid)->latest()->first();
        $report_info->follow = $follow_info->content;
        return view('mobile.member.report_details',['report_info'=>$report_info]);

    }
    /*name  我的二维码*/
    public function user_code(){
        /*  $user = session('wechat.oauth_user'); // 拿到授权用户资料
            $openId = $user->id;*/

        $openId = 1;
        $user_id = session('user_id')?session('user_id'):Members::where('openid',$openId)->value('id');;//会员ID
        $app = app('wechat');
        $qrcode = $app->qrcode;
        $result = $qrcode->forever($user_id);// 或者 $qrcode->forever("foo");
        $ticket = $result->ticket; // 或者 $result['ticket']
        $url = $qrcode->url($ticket);
        $content = file_get_contents($url); // 得到二进制图片内容
        if(!file_exists(public_path('code')))
            mkdir(public_path('code'));

        $img    = public_path('code/'.$user_id.'.jpg');
        file_put_contents($img, $content); // 写入文件
        return view('mobile.member.user_code',['img'=>$img]);

    }

    /*name  下拉项目列表
       type 1 业务报备 2参与的项目 3 分润明细   默认为添加得项目
       */
    public function dropload_project(Request $request ,$type='',$page=''){
        $id = session('user_id');//会员ID
        $type = $request->type;
        if($type ==1){
            $Project = Projects_report::where('mid',$id)->paginate(10);

        }elseif ($type ==2){
            $Project = Member_join_project::where('mid',$id)->paginate(10);
            foreach ($Project as & $v){
                $project_info = Project::where('id',$v['pid'])->select('id','pid','product_name','area','member_number')->first();
                $pnme = Project::find($project_info->pid)->get_project_name()->select('pname')->first();
                $v['pname'] = $pnme->pname;

                $v['number'] = $project_info->member_number;
                $v['area'] = $project_info->area;
                $v['npid'] = $project_info->id;
                $v['product_name'] = $project_info->product_name;
            }

        }elseif($type ==3){
            $Project = Projects_report::where('mid',$id)->orderBy('updated_at','desc')->paginate(10);
            foreach ($Project as & $v){

                $project_info = Project::where('id',$v->pid)->select('product_name','product_profit')->first();
                $v->product_name = $project_info->product_name;
                $v->product_profit = $project_info->product_profit;
            }
        }else{
            $Project = Project::where('mid',1)->paginate(10);

        }
        $list = $Project->toarray();

        return response()->json($list['data']);
    }
}
