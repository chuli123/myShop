<?php
namespace App\Commen;
/**
 * 公共文件
 */
class Commen
{
    public static function setCode($num)
    {
        $code = '';
        for ($i = 0; $i < $num; $i++) {
            $code .= random_int(0, 9);
        }

        return $code;
    }

    public static function eny($pwd, $salt)
    {
        return md5(md5($pwd).$salt);
    }
}