<?php
namespace App\Services;

use App\Models\User;
use App\Commen\Commen;

class UserService
{
    public static function getUsers()
    {
        $users = User::paginate(10);
        return $users;
    }

    public static function setUser($request)
    {
        $salt = Commen::setCode(5);
        $password = Commen::eny($request->password, $salt);
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $password,
            'salt' => $salt,
            'active' => '1',
            'created_at' => date('Y-m-d H:i:s', time()),
        ];

        $id = User::insertGetId($data);
        return $id;
    }

    public static function getUser($id)
    {
        $data = User::where('id', $id)->first();
        return $data;
    }

    public static function update($data)
    {
        $model = User::where('id', $data['id'])->first();
        $model->name = $data['name'];
        $model->email = $data['email'];
        $model->phone = $data['phone'];
        if ($model->save()) {
            return true;
        }

        return false;
    }

    public static function delete($id)
    {
        $model = User::where('id', $id);
        if ($model->delete()) {
            return true;
        }

        return false;
    }
}