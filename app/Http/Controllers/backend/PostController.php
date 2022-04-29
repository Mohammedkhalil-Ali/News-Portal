<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(){
        $posts=DB::table('posts')
        ->join('categories','posts.category_id','=','categories.id')
        ->join('subcategories','posts.subcategory_id','=','subcategories.id')
        ->join('districts','posts.district_id','=','districts.id')
        ->join('subdistricts','posts.subdistrict_id','=','subdistricts.id')
        ->select('posts.*','categories.category_en','subcategories.subcategory_en','districts.district_en','subdistricts.subdistrict_en')
        ->get();
        return view('backend.posts.index',compact('posts'));
    }
    public function create(){
        $categories=DB::table('categories')->get();
        $districts=DB::table('districts')->get();
        return view('backend.posts.create',compact('categories','districts'));
    }

    public function Getsubcategory($id){
        $data=DB::table('subcategories')->where('category_id',$id)->get();
        return response()->json($data);
    }
    public function Getsubdistrict($id){
        $data1=DB::table('subdistricts')->where('district_id',$id)->get();
        return response()->json($data1);
    }

    public function store(Request $request){
        $validate=$request->validate([
            
        ]);

        $data=array();
        $data['title_en']=$request->title_en;
        $data['title_hin']=$request->title_hin;
        $data['category_id']=$request->category_id;
        $data['subcategory_id']=$request->subcategory_id;
        $data['district_id']=$request->district_id;
        $data['subdistrict_id']=$request->subdistrict_id;
        $data['tags_en']=$request->tags_en;
        $data['tags_hin']=$request->tags_hin;
        $data['details_en']=$request->details_en;
        $data['details_hin']=$request->details_hin;
        $data['headline']=$request->headline;
        $data['bigthumbnail']=$request->bigthumbnail;
        $data['first_section']=$request->first_section;
        $data['first_section_thumbnail']=$request->first_section_thumbnail;
        $data['user_id']=Auth::id();
        $data['post_date']=date('d-m-Y');
        $data['post_month']=date('F');

        $image=$request->file('image');
        if($image){
            $imageNewName=uniqid().".".$image->getClientOriginalExtension();
            $imgfile="image/post/";
            $lastname=$imgfile.$imageNewName;
            $image->move($imgfile,$imageNewName);
            $data['image']=$lastname;

            DB::table('posts')->insert($data);
            return redirect()->route('post.create');
        }else{
            return redirect()->back();
        }
        
    }
    public function edit($id){
        $categories=DB::table('categories')->get();
        $districts=DB::table('districts')->get();
        $posts=DB::table('posts')->where('id',$id)->first();
        return view('backend.posts.edit',compact('categories','districts','posts'));
    }

    public function update(Request $request,$id){
        $data=array();
        $data['title_en']=$request->title_en;
        $data['title_hin']=$request->title_hin;
        $data['category_id']=$request->category_id;
        $data['subcategory_id']=$request->subcategory_id;
        $data['district_id']=$request->district_id;
        $data['subdistrict_id']=$request->subdistrict_id;
        $data['tags_en']=$request->tags_en;
        $data['tags_hin']=$request->tags_hin;
        $data['details_en']=$request->details_en;
        $data['details_hin']=$request->details_hin;
        $data['headline']=$request->headline;
        $data['bigthumbnail']=$request->bigthumbnail;
        $data['first_section']=$request->first_section;
        $data['first_section_thumbnail']=$request->first_section_thumbnail;

        $image=$request->file('image');
        if($image){
            $imgOld=$request->imageOld;
            $imageNewName=uniqid().".".$image->getClientOriginalExtension();
            $imgfile="image/post/";
            $lastname=$imgfile.$imageNewName;
            $image->move($imgfile,$imageNewName);
            $data['image']=$lastname;
            unlink($imgOld);

            DB::table('posts')->where('id',$id)->update($data);
            return redirect()->route('post.index');
        }else{
            $data['image']=$request->imageOld;
            DB::table('posts')->where('id',$id)->update($data);
            return redirect()->route('post.index');
        }
    }

    public function delete($id){
        $post=DB::table('posts')->where('id',$id)->first();
        unlink($post->image);
        DB::table('posts')->where('id',$id)->delete();
        return redirect()->route('post.index');
    }
}
