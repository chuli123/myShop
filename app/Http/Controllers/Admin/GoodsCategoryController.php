<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\GoodsCategoryService;

class GoodsCategoryController extends Controller
{
    public function index()
    {
        $data = GoodsCategoryService::getList();
        return view('admin.category.index', compact('data'));
    }
}