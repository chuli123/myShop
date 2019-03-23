<?php
namespace App\Services;

use App\Models\GoodsCategory;

class GoodsCategoryService
{
    public static function getList()
    {
        $data = GoodsCategory::paginate(10);
        return $data;
    }
}