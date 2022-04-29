<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubdistrictController extends Controller
{
    public function index(){
        $subdistricts=DB::table('subdistricts')
        ->join('districts','subdistricts.district_id','=','districts.id')
        ->select('subdistricts.*','districts.district_en')
        ->paginate(3);
        return view('backend.subdistrict.index',compact('subdistricts'));
    }
    public function create(){
        $districts=DB::table('districts')->get();
        return view('backend.subdistrict.create',compact('districts'));
    }
    public function Adddistrict(Request $request){
        
        $data=array();
        $data["subdistrict_en"]=$request->subdistrictEn;
        $data["subdistrict_hin"]=$request->subdistrictHindi;
        $data["district_id"]=$request->districtID;
        DB::table('subdistricts')->insert($data);
        return redirect()->route('Allsubdistrict');
    }

    public function Edit($id){
        $subdistricts=DB::table('subdistricts')->where('id',$id)->first();
        $districts=DB::table('districts')->get();
        return view('backend.subdistrict.edit',compact('subdistricts','districts'));
    }

    public function Update(Request $request,$id){   
        $data=array();
        $data["subdistrict_en"]=$request->subdistrictEn;
        $data["subdistrict_hin"]=$request->subdistrictHindi;
        $data["district_id"]=$request->districtID;
        DB::table('subdistricts')->where('id',$id)->update($data);
        return redirect()->route('Allsubdistrict');
    }
    public function Delete($id){
        DB::table('subdistricts')->where('id',$id)->delete();
        return redirect()->route('Allsubdistrict');
    }
}
