<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{
    public function index(){
        $subcategories=DB::table('subcategories')
        ->join('categories','subcategories.category_id','=','categories.id')
        ->select('subcategories.*','categories.category_en')
        ->paginate(6);
        return view('backend.subcategory.index',compact('subcategories'));
    }
    public function create(){
        $categories=DB::table('categories')->get();
        return view('backend.subcategory.create',compact('categories'));
    }
    public function Addcategory(Request $request){
        
        $data=array();
        $data["subcategory_en"]=$request->subcategoryEn;
        $data["subcategory_hin"]=$request->subcategoryHindi;
        $data["category_id"]=$request->CategoryID;
        DB::table('subcategories')->insert($data);
        return redirect()->route('Allsubcategory');
    }

    public function Edit($id){
        $subcategories=DB::table('subcategories')->where('id',$id)->first();
        $categories=DB::table('categories')->get();
        return view('backend.subcategory.edit',compact('subcategories','categories'));
    }

    public function Update(Request $request,$id){
        
        $data=array();
        $data["subcategory_en"]=$request->subcategoryEn;
        $data["subcategory_hin"]=$request->subcategoryHindi;
        $data["category_id"]=$request->CategoryID;
        DB::table('subcategories')->where('id',$id)->update($data);
        return redirect()->route('Allsubcategory');
    }
    public function Delete($id){
        DB::table('subcategories')->where('id',$id)->delete();
        return redirect()->route('Allsubcategory');
    }
}
