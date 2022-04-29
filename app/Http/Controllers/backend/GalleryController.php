<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function index(){
        $gallery=DB::table('photos')->get();
        return view('backend.gallery.index',compact('gallery'));
    }
    public function GalleryCreate(){
        return view('backend.gallery.create');
    }
    public function GalleryStore(Request $request){
        $data=array();
        $data['title']=$request->title;
        $data['type']=$request->type;
        

        $image=$request->file('image');
        if($image){
            $imageNewName=uniqid().".".$image->getClientOriginalExtension();
            $imgfile="image/gallery/";
            $lastname=$imgfile.$imageNewName;
            $image->move($imgfile,$imageNewName);
            $data['photo']=$lastname;

            DB::table('photos')->insert($data);
            return redirect()->route('gallery.index');
        }else{
            return redirect()->back();
        }
    }

    public function GalleryEdit($id){
        $gallery=DB::table('photos')->where('id',$id)->first();
        return view('backend.gallery.edit',compact('gallery'));
    }

    public function GalleryUpdate(Request $request,$id){
        $data=array();
        $data['title']=$request->title;
        $data['type']=$request->type;

        $image=$request->file('image');
        if($image){
            $imgOld=$request->oldimg;
            $imageNewName=uniqid().".".$image->getClientOriginalExtension();
            $imgfile="image/gallery/";
            $lastname=$imgfile.$imageNewName;
            $image->move($imgfile,$imageNewName);
            $data['photo']=$lastname;
            unlink($imgOld);

            DB::table('photos')->where('id',$id)->update($data);
            return redirect()->route('gallery.index');
        }else{
            $data['photo']=$request->oldimg;
            DB::table('photos')->where('id',$id)->update($data);
            return redirect()->route('gallery.index');
        }
    }

    public function GalleryDelete($id){
        DB::table('photos')->where('id',$id)->delete();
        return redirect()->back();
    }

    public function indexVideo(){
        $videos=DB::table('videos')->get();
        return view('backend.gallery.indexVideo',compact('videos'));
    }
    public function GalleryCreateVideo(){
        return view('backend.gallery.createVideo');
    }
    public function GalleryStoreVideo(Request $request){
        $data=array();
        $data['title']=$request->title;
        $data['type']=$request->type;
        $data['video_link']=$request->video_link;

        DB::table('videos')->insert($data);
        return redirect()->route('galleryVideo.index');
    }
    public function GalleryEditVideo($id){
        $videos=DB::table('videos')->where('id',$id)->first();
        return view('backend.gallery.editVideo',compact('videos'));
    }
    public function GalleryUpdateVideo(Request $request,$id){
        $data=array();
        $data['title']=$request->title;
        $data['type']=$request->type;
        $data['video_link']=$request->video_link;

        DB::table('videos')->where('id',$id)->update($data);
        return redirect()->route('galleryVideo.index');
        
    }
    public function GalleryDeleteVideo($id){
        DB::table('videos')->where('id',$id)->delete();
        return redirect()->back();
    }
}
