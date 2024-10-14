<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class CategoryController extends Controller
{
    const PATH_VIEW = 'admin.category.';

    public function index(){

        $categories = DB::table('categories')->get();

        return view(self::PATH_VIEW . 'list', compact('categories'));
        
    }

    public function create(){
        
            return view(self::PATH_VIEW . 'create');
    }

    public function store(Request $request ){

        $validatedData = $request->validate([
            'name' =>['required' , 'unique:categories', 'max:255'],
        ]);

        $data = [
            'name' => $request['name']
         ];
         DB::table('categories')->insert($data);
     
      return redirect()->route('category.list')->withErrors($validatedData);

  
    }

    public function edit($id){
        $category = DB::table('categories')
        ->where('id', $id)
        ->first();

       return view(self::PATH_VIEW . 'edit',compact('category'));

    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'name' =>['required' , 'unique:categories', 'max:255'],
        ]);

        $data = [
            'name' => $request['name']
         ];
         DB::table('categories')
         ->where('id',$id)->update($data);
     
      return redirect()->route('category.list')->withErrors($validatedData);
    }
}
