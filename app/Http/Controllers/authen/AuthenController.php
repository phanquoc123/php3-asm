<?php

namespace App\Http\Controllers\authen;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenController extends Controller
{
    public function showFormLogin(){

        return view('authentication.login');

    }
    public function handleLogin(){

        $credentials = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
           request()->session()->regenerate();
 
            // return redirect()->intended('dashboard');
            /**
             *  @var User $user
          
             */
            
              
            $user = Auth::user();
            if($user->isAdmin()){
                return redirect()->route('dashboard');

            }
            return redirect()->route('home');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }
    public function showFormRegister(){
        return view('authentication.register');

    }
    public function handleRegister(){

      $data =   request()->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = User::query()->create($data);

        Auth::login($user);
        request()->session()->regenerate();
        return redirect()->route('home');

    }
    public function logout(){

        Auth::logout();
 
        request()->session()->invalidate();
     
        request()->session()->regenerateToken();
     
        return redirect()->route('home');

    }
}
