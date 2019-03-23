<?php
namespace App\Http\Requests\Admin;

use App\Http\Requests\CommonRequest;

class UserRequest extends CommonRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'phone' => 'string',
            'email' => 'string',
            'password' => 'required|same:repassword',
        ];
    }

    public function messages()
    {
        return [
            'name.require' => '用户名是必填的',
            'password' => '密码是比填的',

        ];
    }
}