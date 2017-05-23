<?php
namespace App\Http\Controllers\Mobile;


use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Projects_name;
use Illuminate\Http\Request;

class ProjectController extends Controller{

    public function project_lists(){

        return view('mobile.project.project_lists');

    }
    /*name：项目详情
    *item id 项目ID type  //1 个人项目 0查看项目
    */
    public function project_details(Request $request,$type=0){

        $id = $request->id;
        $type = $request->type?$request->type:0;
        $project = Project::where('id',$id)->first();
       // dd($project);
        return view('mobile.project.project_details',['project'=>$project,'type'=>$type]);

    }
    public  function get_project_name(Request $request){
        $mid = 1;
        $project_name = Projects_name::where('mid',$mid)->select('id','pname')->get();

        foreach ($project_name->toarray() as $k=>$v){
            $new_p[$k]['title'] = $v['pname'];
            $new_p[$k]['value'] = $v['id'];
        }
        $lists['item']=$new_p;
        $lists['title'] = '项目名称';

        return response()->json($lists);
    }
    /*根据项目获取产品列表*/
    public function get_project_list(Request $request){

      $id = $request->id;
      $list = Projects_name::find($id)->get_project_list()->select('id','product_name')->get();
      $list = $list->toarray();
      foreach ($list as $k=>$v){
          $lee[$k]['title']=$v['product_name'];
          $lee[$k]['value']=$v['id'];
      }
      $lists['item']=$lee;
      $lists['title']='产品名称';
      return response()->json($lists);
    }



}
