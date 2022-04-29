<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        $categories=DB::table('categories')->orderBy('id','desc')->paginate(8);
        return view('backend.category.index',compact('categories'));
    }
    public function create(){
        return view('backend.category.create');
    }
    public function Addcategory(Request $request){
        $validate=$request->validate([
            'category_en'=>'Required|unique:categories|max:255',
            'category_hin'=>'Required|unique:categories|max:255',
        ]);
        $data=array();
        $data['category_en']=$request->category_en;
        $data['category_hin']=$request->category_hin;
        DB::table('categories')->insert($data);
        return redirect()->route('Allcategory');
    }

    public function Edite($id){
        $data=DB::table('categories')->where('id',$id)->first();
        return view('backend.category.edite',compact('data'));
    }
    public function Update(Request $request,$id){
        $validate=$request->validate([
            'category_en'=>'Required|unique:categories|max:255',
            'category_hin'=>'Required|unique:categories|max:255',
        ]);
        $data=array();
        $data['category_en']=$request->category_en;
        $data['category_hin']=$request->category_hin;
        DB::table('categories')->where('id',$id)->update($data);
        return redirect()->route('Allcategory');
    }
    public function Delete($id){
        DB::table('categories')->where('id',$id)->delete();
        return redirect()->route('Allcategory');
    }
}
