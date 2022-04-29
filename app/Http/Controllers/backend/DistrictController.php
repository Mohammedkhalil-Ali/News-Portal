<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistrictController extends Controller
{
    public function index(){
        $districts=DB::table('districts')->orderBy('id','desc')->paginate(5);
        return view('backend.district.index',compact('districts'));
    }
    public function create(){
        return view('backend.district.create');
    }
    public function Adddistrict(Request $request){
        $validate=$request->validate([
            'district_en'=>'Required|unique:districts|max:255',
            'district_hin'=>'Required|unique:districts|max:255',
        ]);
        $data=array();
        $data['district_en']=$request->district_en;
        $data['district_hin']=$request->district_hin;
        DB::table('districts')->insert($data);
        return redirect()->route('Alldistrict');
    }

    public function Edite($id){
        $data=DB::table('districts')->where('id',$id)->first();
        return view('backend.district.edit',compact('data'));
    }
    public function Update(Request $request,$id){
        $validate=$request->validate([
            'district_en'=>'Required|max:255',
            'district_hin'=>'Required|max:255',
        ]);
        $data=array();
        $data['district_en']=$request->district_en;
        $data['district_hin']=$request->district_hin;
        DB::table('districts')->where('id',$id)->update($data);
        return redirect()->route('Alldistrict');
    }
    public function Delete($id){
        DB::table('districts')->where('id',$id)->delete();
        return redirect()->route('Alldistrict');
    }
}
