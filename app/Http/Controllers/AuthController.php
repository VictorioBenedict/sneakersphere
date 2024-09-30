<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function index(){
        $users = User::all();
        return response()->json(['users' => $users]);
    }
    public function register(){
        return view ('register');
    }
    
    public function registerpost(Request $request){

        $existinguser = User::where('email',$request->email)->first();
        if ($existinguser) {
            return back()->with('error','Email has been already taken.');
        }

        $password = $request->input('password');
        $cpassword = $request->input('confirmpassword');

        if($password != $cpassword){
            return back()->with('error', 'Password is not match!');
        }
        else{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();
            return back()->with('success', 'Registered successfully.');
        }

    }
    public function login(){
        session()->forget('cart');
        return view ('login');
    }
    public function loginpost(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' =>$request->password,
        ];

        if(Auth::attempt($credentials)){
            return redirect('/yha!2746dghmzndccghfdujmAzhc681028fghfbz/home');
        }
        else {
            return back()->with('error', 'Invalid email or password.');
        }
        return back()->with('error','Please try again.');
    }

    public function logout(){
        session()->forget('cart');
        CartItem::truncate();
        Auth::logout();
        return redirect('/');
    }
}
