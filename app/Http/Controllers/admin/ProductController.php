<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    
        const PATH_VIEW = 'admin.product.';

      

        public function index(){

            $products = Product::all(); 
            // $imageUrl = asset('storage/app' . $products->image);
            // $products->restore();
         
            return view(self::PATH_VIEW . 'list', compact('products'));
        }

    public function create(){
           
        $categories = Category::query()->get();

        return view( self::PATH_VIEW . '.create', compact('categories'));
    }

    public function store(Request $request){

        $data = $request->except('image');
        $validatedData = $request->validate([
            'name' =>['required' , 'unique:products', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'price' =>['required'],
            'remaining_quantity' =>['required'],
            'description' =>['required' ,'max:255'],
            'category_id' =>['required'],
        ]);

        $data = [
            'name' => $request['name'],
            'price' => $request['price'],
            'remaining_quantity' => $request['remaining_quantity'],
            'description' => $request['description'],
            'category_id' => $request['category_id'],
         ];
         if($request->hasFile('image')){
            $path = $request->file('image')->store('products', 'public');
            $data['image'] = $path;
            // $data['image'] = Storage::put(self::PATH_UPLOAD , $request->file('image'));
         }

         Product::query()->create($data);
         return redirect()->route('product.list')->withErrors($validatedData);




    }


    public function delete($id){
      
        $products = Product::findOrFail($id); // Find the user with ID 1

        $products->delete();

        return redirect()->route('product.list');

    }

    public function restore($id){
       Product::onlyTrashed()->get();
        Product::withTrashed()->where('id',$id)
        ->restore();

        return redirect()->route('product.list');

    }

        public function edit($id){
            $category = Category::all();
            $product = Product::findOrFail($id);

            return view(self::PATH_VIEW . '.edit', compact('category','product'));
        }

    public function update(Request $request , $id){

        $product = Product::findOrFail($id);

        $data = $request->except('image');


        $validatedData = $request->validate([
            'name' =>['required' , 'unique:products', 'max:255'],
            'image' => ['image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'price' =>['required'],
            'remaining_quantity' =>['required'],
            'description' =>['required' ,'max:255'],
            'category_id' =>['required'],
        ]);

        $data = [
            'name' => $request['name'],
            'price' => $request['price'],
            'remaining_quantity' => $request['remaining_quantity'],
            'description' => $request['description'],
            'category_id' => $request['category_id'],
         ];
         if($request->hasFile('image')){
            $path = $request->file('image')->store('products', 'public');
            $data['image'] = $path;
            // $data['image'] = Storage::put(self::PATH_UPLOAD , $request->file('image'));
         }

         $currentCover = $product->image;

         $product->update($data);
           /**
            * Việc xóa ảnh khi thay ảnh khi update phải làm sau khi update
            * Tránh việc update không thành công mà đã mất file ảnh cũ
            */
            if($currentCover != "" &&  Storage::exists($currentCover)){
              Storage::delete($currentCover);
            }
  
        //   return back();

        //  Product::query()->update($id);
         return redirect()->back()->withErrors($validatedData);

    }
}
