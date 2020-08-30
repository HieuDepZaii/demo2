<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class AdminController extends Controller
{
    //
    public function index(){
        return view('');
    }
    public function show_dashboard(){
        return view('admin.dashboard');
    }
    public function login(){
        return view('admin.admin_login');
    }
    public function check_login(Request $request){
        $emai=$request->email;
        $pass=md5($request->pass);
        $result= DB::table('admin')->where('email',$emai)->where('password',$pass)->first();
        if($result){
            Session::put('admin_name',$result->admin_user_name);
            Session::put('admin_id',$result->id);
            return Redirect::to(route('admin.show_dashboard'));
        }else{
            Session::put('message','Mật khẩu hoặc email không đúng');
            return Redirect::to(route('admin.login'));
            
        }
        
    }
    public function logout(){
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to(route('admin.login'));
        // nếu dùng redirect thay view thì đường dẫn sẽ theo cái đường dẫn trong redirect còn nếu dùng view thì đường dẫn theo cái route trước đó
    }
}
