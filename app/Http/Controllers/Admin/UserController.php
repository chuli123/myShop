<?php
/**
 * Created by PhpStorm.
 * User: cy
 * Date: 2019/3/15
 * Time: 22:34
 */
namespace  App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Services\UserSevice;

class UserController extends Controller
{
    public function list()
    {
        $data = UserSevice::getUsers();
        return view('admin.users.list', compact('data'));
    }

    public function add()
    {
        return view('admin.users.add');
    }

    public function store(UserRequest $request)
    {
        $data = UserSevice::setUser($request);
        if (!empty($data)) {
            return view('admin.users.list', ['msg' => '添加成功']);
        }

        return ;
    }
}