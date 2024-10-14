<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    const PATH_VIEW = 'admin.user.';

    public function index(){
        $users = User::all();

        return view(self::PATH_VIEW . 'list', compact('users'));
    }
    public function create(){
        
        return view( self::PATH_VIEW . '.create');
    }
    public function store(Request $request){

        
        $validatedData = $request->validate([
            'name' =>['required' , 'unique:users', 'max:255'],
            'email' => ['required', 'email','unique:users'],
            'password' =>['required'],
           
        ]);

        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'type' => $request['type'],
            'active' => $request['active'],
         ];
   

         User::query()->create($data);
         return redirect()->route('user.list')->withErrors($validatedData);

    }
    public function edit($id){
      
        $user = User::findOrFail($id);

        return view(self::PATH_VIEW . '.edit', compact('user'));
    }


    public function update(Request $request , $id){

        $user = User::findOrFail($id);
        $validatedData = $request->validate([
            'name' =>['required' , 'max:255'],
            'email' => ['required', 'email'],
            'password' =>['required'],
           
        ]);

        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'type' => $request['type'],
            'active' => $request['active'],
         ];
   

        $user->update($data);
         return redirect()->route('user.list')->withErrors($validatedData);

    }

    public function delete($id)
    {
        $user = User::findOrFail($id);

        if(Auth::user()->id == $user->id ){
            return redirect()->route('user.list')->with('error', 'Tài khoản đang được đăng nhập');
        }
        
        if(Auth::user()->active == 1 ){
            return redirect()->route('user.list')->with('error_active', 'Tài khoản đang trong trạng thái hoạt động');
        }
     
        $user->delete();

        return redirect()->route('user.list')->with('status', 'Xóa người dùng thành công.');
    }


}
