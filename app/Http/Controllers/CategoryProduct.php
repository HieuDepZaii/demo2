<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryProduct extends Controller
{
    public function add_category(){
        return view('admin.add_category_product');
    }
    public function all_category(){
        $category_products= DB::select('select * from catogory_product');
        return view('admin.all_category_product',['category_products'=>$category_products]);
    }
    public function save_category_product(Request $request){
        $data=array();
        $data['category_name']=$request->category_name;
        $data['mo_ta']=$request->category_description;
        $data['yeu_thich']=$request->yeu_thich;
        print_r($data);
        try {
            DB::table('catogory_product')->insert($data);
            Session::put('message','thêm danh mục thành công');
        } catch (\Throwable $th) {
            Session::put('message','có lỗi xảy ra');
        }

        return Redirect::to(route('CategoryProduct.add_category'));
    }
    public function like_category_product($id){
        $category_products=DB::table('catogory_product')->where('id',$id)->update(['yeu_thich'=>1]);
        return Redirect::to(route('CategoryProduct.all_category'));
    }
    public function unlike_category_product($id){
        $category_products=DB::table('catogory_product')->where('id',$id)->update(['yeu_thich'=>0]);
        return Redirect::to(route('CategoryProduct.all_category'));
    }
}
