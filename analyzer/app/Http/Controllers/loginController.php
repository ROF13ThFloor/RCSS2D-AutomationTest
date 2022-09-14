<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class loginController extends Controller
{
    //
    public function  login(Request $req){
        $email = $req->input("email");
        $password= $req->input("password");
        $checklogin = DB::table('users')->where(['email' => $email , 'password' => $password])->get();
        if (count($checklogin) >0 ){
            return view('home');
        }
        else{
            echo "fail login";
        }

    }

}
