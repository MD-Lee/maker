<?php
namespace App\Http\Controllers\Mobile;


use App\Http\Controllers\Controller;

class MemberController extends Controller{

    public function toRegister(){

        return view('mobile.register');

    }
    public function toLogin(){

        return view('mobile.login');

    }
    /*name  个人中心*/
    public function person_center(){

        return view('mobile.member.person_center');

    }
    /*name  资料修改*/
    public function user_info(){

        return view('mobile.member.user_info');

    }
    /*name  分润明细*/
    public function user_profit(){

        return view('mobile.member.user_profit');

    }
    /*name  项目建立*/
    public function project_list(){

        return view('mobile.member.project_list');

    }
    /*name  新增项目建立*/
    public function project_add(){

        return view('mobile.member.project_add');

    }
    /*name  参与的产品*/
    public function user_project(){

        return view('mobile.member.user_project');

    }
    /*name  发布的资源*/
    public function user_resources(){

        return view('mobile.member.user_resources');

    }
    /*name  业务报备*/
    public function user_report(){

        return view('mobile.member.user_report');

    }
    /*name  业务报备添加*/
    public function report_add(){

        return view('mobile.member.report_add');

    }
    /*name  业务报备详情*/
    public function report_details(){

        return view('mobile.member.report_details');

    }
    /*name  我的二维码*/
    public function user_code(){

        return view('mobile.member.user_code');

    }


}
