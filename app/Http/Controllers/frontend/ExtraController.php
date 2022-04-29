<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class ExtraController extends Controller
{
    public function English(){
        Session::get('lang');
        Session()->forget('lang');
        Session()->put('lang','english');
        return redirect()->back();

    }
    public function Hindi(){
        Session::get('lang');
        Session()->forget('lang');
        Session()->put('lang','hindi');
        return redirect()->back();
    }
    public function SinglePage($id){
        $post=DB::table('posts')
        ->join('categories','posts.category_id','categories.id')
        ->join('subcategories','posts.subcategory_id','subcategories.id')
        ->select('posts.*','categories.category_en','categories.category_hin',
        'subcategories.subcategory_en','subcategories.subcategory_hin')
        ->where('posts.id',$id)->first();
        return view('main.single_page',compact('post'));
    }
    public function GotoCategoryPage($id,$categoryName){
        $posts=DB::table('posts')->where('category_id',$id)->limit(6)->paginate(3);
        return view('main.category',compact('posts'));
    }
    public function GotoSubCategoryPage($id,$subcategoryName){
        $posts=DB::table('posts')->where('subcategory_id',$id)->limit(6)->paginate(3);
        return view('main.category',compact('posts'));
    }
}
