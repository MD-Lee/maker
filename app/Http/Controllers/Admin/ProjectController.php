<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Projects_name;
use Illuminate\Http\Request;

class ProjectController extends Controller{

    public function index(){
       $list =  Project::where('is_deletes',0)->get();
        $sum = count($list->toArray());
       foreach ($list as & $v){
           $v->pname =Project::find($v->id)->get_project_name()->value('pname');
           $status = config('person.project_status');
           $v->status = $status[$v->status];
       }

        return view('admin.project.project',['list'=>$list,'sum'=>$sum]);

    }
    public function project_details(Request $request){
        if($request->isMethod('post')){
            $request_info = $request->only('id','reason','status');
            $id = $request_info['id'];
            unset($request_info['id']);
            Project::where('id',$id)->update($request_info);
            return redirect('admin/project')->withSuccess('修改成功！');
        }
        $id = $request->id;
        $project_info = Project::find($id);
        $project_info->pname = Project::find($id)->get_project_name()->value('pname');
        return view('admin.project.project_details',['project_info'=> $project_info]);

}
    public function del_project(Request $request){
        $id = $request->id;
        $update['is_deletes'] = 1;
        $result = Project::where('id',$id)->update($update);
        $red['error']=$result?0:1;
        $red['msg']=$result?0:"删除失败";
        return response()->json($red);
    }
    public function delall_project(Request $request){
        $requestdata = $request->only('str');
        $allid =substr($requestdata['str'],0,-1);
        $allid = explode(',',$allid);
        foreach ($allid as $v){
            $update['is_deletes'] = 1;
            $result = Project::where('id',$v)->update($update);
        }

        $red['error']=$result?0:1;
        $red['msg']=$result?0:"删除失败";
        return response()->json($red);
    }



}