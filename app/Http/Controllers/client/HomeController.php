<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{   
    public function index(){

        //   
        $categories = DB::table('categories')->get();
        // $products = DB::table('products')
        // ->orderByDesc('id')
        // ->limit(3)
        // ->get();
        
        $products = Product::orderBy('id', 'desc')->paginate(3);
        


        return view('clients.index', compact('products','categories'));
    }
    public function shop(){
        $categories = DB::table('categories')->get();

        $products = Product::orderBy('id', 'desc')->paginate(6);

        return view('clients.shop', compact('products','categories'));
    }

    public function detail($id){

        $product = Product::find($id);
        $categories = Category::all();

        // $category = Category::find($id);
        
        // $relateProducts = $category->products;
        $allRelatedProducts = $product->category->products;
        $relatedProducts = $allRelatedProducts->except($product->id);

        


     return view('clients.detail', compact('product','categories','relatedProducts'));

   
    }

    public function shopByCategory($categoryId){

        $categories = DB::table('categories')->get();

        
        $category = Category::find($categoryId);
        $productsByCate = $category->products;
    
        return view('clients.shopByCategory', compact('productsByCate', 'category','categories'));
    }

    public function search(Request $request)
    {
        $categories = DB::table('categories')->get();
        $keyword = $request->input('keyword');

        $products = Product::where('name', 'like', "%{$keyword}%")
                           
                    ->paginate(3); 

       
    //  dd($products);
        return view('clients.search', compact('products', 'keyword','categories'));
    }

    public function showFormLoginClient(){
        return view('authentication.login');
    }

    
}
