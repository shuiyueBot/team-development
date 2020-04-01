<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
class LoginController extends Controller
{
    public function login(){
        return view("login.login");       
    }
    public function loginDo(){
        $post=request()->except("_token");
        $res=Admin::where($post)->first();
        if($res){
            session(["admin"=>$res]);
           return \redirect("/new/index");
            
        }else{
            return \redirect("/login/login");
        }
    }
}
