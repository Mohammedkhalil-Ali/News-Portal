<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdsController extends Controller
{
    public function index(){
        $ads=DB::table('ads')->get();
        return view('backend.ads.index',compact('ads'));
    }
    public function create(){
        return view('backend.ads.AddAds');
    }
    public function store(Request $request){
        $data=array();
        $data['link_ads']=$request->link_ads;
        $data['shewakay']=$request->shewakay;
        
        $image=$request->file('image');
        if($image){
            $newname=uniqid().'.'.$image->getClientOriginalExtension();
            $imgfile='image/ads/';
            $lastimgname=$imgfile.$newname;
            $data['image']=$lastimgname;
            $image->move($imgfile,$newname);
            DB::table('ads')->insert($data);
            return redirect()->route('Ads.index');
        }else{
            return redirect()->route('Ads.create');
        }
    }
    public function edit($id){
        $ads=DB::table('ads')->where('id',$id)->first();
        return view('backend.ads.edit',compact('ads'));
    }
    public function update(Request $request,$id){
        $data=array();
        $data['link_ads']=$request->link_ads;
        $data['shewakay']=$request->shewakay;

        $image=$request->file('image');
        if($image){
            $imgOld=$request->old_image;
            unlink($imgOld);
            $newname=uniqid().'.'.$image->getClientOriginalExtension();
            $imgfile='image/ads/';
            $lastimgname=$imgfile.$newname;
            $data['image']=$lastimgname;
            $image->move($imgfile,$newname);
            DB::table('ads')->where('id',$id)->update($data);
            return redirect()->route('Ads.index');
        }else{
            DB::table('ads')->where('id',$id)->update($data);
            return redirect()->route('Ads.index');
        }
    }
    public function delete($id){
        $img=DB::table('ads')->where('id',$id)->first();
        unlink($img->image);
        DB::table('ads')->where('id',$id)->delete();
        return redirect()->route('Ads.index');
    }
}
