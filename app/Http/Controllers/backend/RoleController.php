<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    public function index(){
        $role=DB::table('users')->where('type',0)->get();
        return view('backend.role.index',compact('role'));
    }
    public function create(){
        return view('backend.role.create');
    }
    public function store(Request $request){
        $data=array();
        $data['type']=0;
        $data['category']=$request->category;
        $data['district']=$request->district;
        $data['setting']=$request->setting;
        $data['gallery']=$request->gallery;
        $data['post']=$request->post;
        $data['ads']=$request->ads;
        $data['role']=$request->role;
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=Hash::make($request->password);

        DB::table('users')->insert($data);
        return redirect()->route('Role.index');
    }
    public function edit($id){
        $role=DB::table('users')->where('id',$id)->first();
        return view('backend.role.edit',compact('role'));
    }
    public function update(Request $request,$id){
        $data=array();
        $data['type']=0;
        $data['category']=$request->category;
        $data['district']=$request->district;
        $data['setting']=$request->setting;
        $data['gallery']=$request->gallery;
        $data['post']=$request->post;
        $data['ads']=$request->ads;
        $data['role']=$request->role;
        $data['name']=$request->name;
        $data['email']=$request->email;

        DB::table('users')->where('id',$id)->update($data);
        return redirect()->route('Role.index');
    }
    public function delete($id){
        DB::table('users')->where('id',$id)->delete();
        return redirect()->route('Role.index');
    }

}
