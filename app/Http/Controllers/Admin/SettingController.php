<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller{


    public function setting(Request $request){
        if($request->isMethod('post')){

            $this->validate($request, [
                'number' => 'required',
                'time' => 'required',
            ], [
                'required'=>':attribute 为必填项',

                ],[
                    'number'=>'报备上限',
                    'time'=>'报备有效期',
                ]
            );

            $setting_info = Setting::where('id',1)->get();
            $postdata = $request->all();
            unset($postdata['_token']);
            if($setting_info->isEmpty()){
                Setting::create($postdata);

            }else{
                Setting::where('id',1)->update($postdata);

            }

        }
        $setting_info = Setting::where('id',1)->get();
        $setting_info =  $setting_info->isEmpty()?'':$setting_info;

        return view('admin.setting.setting',['setting_info'=>$setting_info]);

    }



}