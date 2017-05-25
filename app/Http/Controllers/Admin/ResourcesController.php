<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;

class ResourcesController extends Controller{

    public function resources(Request $request){
        $t = $request->t;//1  寻求 2提供
        $resouces_list = Resource::where('type',$t)->get();
        foreach ($resouces_list as $item) {
            $user_info = Resource::find($item->id)->get_user_info()->select('uname','mobile')->first();

           $item['uname'] = $user_info->uname;
            $item['mobile'] = $user_info->mobile;
        }
        return view('admin.resources.index',['resouces_list'=>$resouces_list,'t'=>$t]);

    }

    public function add_resources(Request $request ,$t='1'){
        if($request->isMethod('post')){
            $postdata = $request->only('type','resource_name');
            //print_r($postdata);
            Resource::create($postdata);
        }
        $type = $request->t;

        return view('admin.resources.add_resources',['type'=>$type]);

    }
    public function del_resource(Request $request){
        $id = $request->id;
        $res = Resource::where('id',$id)->delete();
        $result['error'] = $res?1:2;
        return response()->json($result);
    }


}