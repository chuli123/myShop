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
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //获取会员列表
    public function list()
    {
        $data = UserService::getUsers();
        return view('admin.users.list', compact('data'));
    }

    //添加会员
    public function add()
    {
        return view('admin.users.add');
    }

    //添加保存会员
    public function store(UserRequest $request)
    {
        $data = UserService::setUser($request);
        if (!empty($data) && is_numeric($data)) {
            return response()->json(['msg' => '添加成功', 'code' => 200]);
        }

        return response()->json(['msg' => '添加失败', 'code' => 500]);
    }

    //修改会员
    public function edit($id)
    {
        $data = UserService::getUser($id);

        return view('admin.users.edit', compact('data'));
    }

    //更新会员
    public function update(Request $request)
    {
        $data = UserService::update($request->all());
        if (!empty($data)) {
            return response()->json(['msg' => '修改成功', 'code' => 200]);
        }

        return response()->json(['msg' => '添加失败', 'code' => 500]);
    }

    //删除会员
    public function delete($id)
    {
        $data = UserService::delete($id);
        if (!empty($data)) {
            return response()->json(['msg' => '修改成功', 'code' => 200]);
        }

        return response()->json(['msg' => '添加失败', 'code' => 500]);
    }
}