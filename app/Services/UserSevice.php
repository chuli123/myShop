<?php
namespace App\Services;

use App\Models\User;
use App\Commen\Commen;

class UserSevice
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
            'phone' => isset($request->name) ?? '',
            'email' => isset($request->email) ?? '',
            'password' => $password,
            'salt' => $salt,
            'active' => '1',
            'created_at' => date('Y-m-d H:i:s', time()),
        ];

        $id = User::insertGetId($data);
        return $id;
    }
}