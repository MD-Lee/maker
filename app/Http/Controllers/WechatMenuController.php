<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class WechatMenuController extends Controller
{
    public function index()
    {
          $app = app('wechat');
          $menu = $app->menu;
        //  $menus = $menu->test('oWPflvq6NbJN9MLy9ZQRDSnjROZE');
         $menus = $menu->all();
          dd($menus);
    }

    public function del()
    {
        $app = app('wechat');
        $menu = $app->menu;
        $menu->destroy(); // 全部

    }

    public function add($value='')
    {
        $app = app('wechat');
        $menu = $app->menu;
		$url = "http://".$_SERVER['HTTP_HOST'];
        $buttons = [
            [
                "type"       => "view",
                "name"       => "首页",
                "url"       => $url."/index",
                
            ],
            [
                "name" => "分类",
               "sub_button"=>[
					[
						"type" => "view",
                        "name" => "在线培训",
                        "url"  => $url."/cources_lists"
					],
					[
						"type" => "view",
                        "name" => "资源库",
                        "url"  => $url."/resources_list"
					],
					[
						"type" => "view",
                        "name" => "产品库",
                        "url"  => $url."/project_lists"
					]
					
					
			   ],
            ],
            [
				"type"       => "view",
                "name"       => "我的",
                "url"       => $url."/person_center",
             
            ],
        ];

  $menu->add($buttons);

    }
   


}
