<?php

namespace App\Http\Requests;

//use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;
class MemberLoginRequest extends Request
{
	public function authorize() 
    {
       return true; 
    }
 
    public function rules() // 这个方法返回验证规则数组，也就是Validator的验证规则
    {
       return [
            'username' =>,
			'password' =>
	   ];
    }
}
