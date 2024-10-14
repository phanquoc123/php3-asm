<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){


        $totalProductsWithHotType = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->where('categories.name', 'like', '%Lemon%')
            ->count();

        $totalProductsWithNewType = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->where('categories.name', 'like', '%Berry%')
            ->count();

        $totalUser = User::query()->where('active', 1)->count();

        $totalProduct = Product::query()->count();

        return view('admin.index', [
            'total_product_hot' => $totalProductsWithHotType,
            'total_product_new' => $totalProductsWithNewType,
            'total_user' => $totalUser,
            'total_product' => $totalProduct
        ]);


        // return view('admin.index');
    }
}
