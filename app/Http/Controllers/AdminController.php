<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
   
    public function admin(){
        session()->forget('cart');
        return view ('adminlogin');
    }

    public function adminpost(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        if($email === 'admin' && $password === 'admin'){
            return redirect('dashboard!2HmHzjLE90zxbdgftcxnbsazxctyr538djf!');
        }
        else {
            return back()->with('error', 'Please check your credentials and try again.');
        }
        return back()->with('error','Please check your credentials and try again.');
    }

  
    

   
}
