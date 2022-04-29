<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{


    //Social
    public function SocialSettingIndex(){
        $social=DB::table('socials')->get();
        return view('backend.setting.social.Socials',compact('social'));
    }

    public function SocialSettingCreate(){
        return view('backend.setting.social.addsocial');
    }

    public function SocialSettingStore(Request $request){
        $data=array();
        $data['facebook']=$request->facebook;
        $data['twitter']=$request->twitter;
        $data['youtube']=$request->youtube;
        $data['linkedin']=$request->linkedin;
        $data['instagram']=$request->instagram;
        DB::table('socials')->insert($data);
        return redirect()->back();
    }
    public function SocialSetting($id){
        $social=DB::table('socials')->where('id',$id)->first();
        return view('backend.setting.social.socialupdate',compact('social'));
    }

    public function SocialUpdate(Request $request,$id){
        $data=array();
        $data['facebook']=$request->facebook;
        $data['twitter']=$request->twitter;
        $data['youtube']=$request->youtube;
        $data['linkedin']=$request->linkedin;
        $data['instagram']=$request->instagram;
        DB::table('socials')->where('id',$id)->update($data);
        return redirect()->back();
    }
    public function SocialSettingDelete($id){
        DB::table('socials')->where('id',$id)->delete();
        return redirect()->back();
    }

    // SEO
    public function SeoSettingIndex(){
        $seos=DB::table('seos')->get();
        return view('backend.setting.seo.index',compact('seos'));
    }
    public function SeoSettingCreate(){
        return view('backend.setting.seo.addseo');
    }
    public function SeoSettingStore(Request $request){
        $data=array();
        $data['meta_author']=$request->meta_author;
        $data['meta_title']=$request->meta_title;
        $data['meta_keyword']=$request->meta_keyword;
        $data['meta_description']=$request->meta_description;
        $data['google_analytics']=$request->google_analytics;
        $data['google_verification']=$request->google_verification;
        $data['alexa_analytics']=$request->alexa_analytics;
        DB::table('seos')->insert($data);
        return redirect()->back();
    }
    public function SeoSettingEdit($id){
        $seos=DB::table('seos')->where('id',$id)->first();
        return view('backend.setting.seo.edit',compact('seos'));
    }
    public function SeoUpdate(Request $request,$id){
        $data=array();
        $data['meta_author']=$request->meta_author;
        $data['meta_title']=$request->meta_title;
        $data['meta_keyword']=$request->meta_keyword;
        $data['meta_description']=$request->meta_description;
        $data['google_analytics']=$request->google_analytics;
        $data['google_verification']=$request->google_verification;
        $data['alexa_analytics']=$request->alexa_analytics;
        DB::table('seos')->where('id',$id)->update($data);
        return redirect()->back();
    }
    public function SeoSettingDelete($id){
        DB::table('seos')->where('id',$id)->delete();
        return redirect()->back();
    }

    //Prayer

    public function PrayerSettingIndex(){
        $prayers=DB::table('prayers')->get();
        return view('backend.setting.prayer.index',compact('prayers'));
    }
    public function PrayerSettingCreate(){
        return view('backend.setting.prayer.create');
    }
    public function PrayerSettingStore(Request $request){
        $data=array();
        $data['bayany']=$request->bayany;
        $data['khorhalatn']=$request->khorhalatn;
        $data['nywaro']=$request->nywaro;
        $data['asr']=$request->asr;
        $data['maxrib']=$request->maxrib;
        $data['aysha']=$request->aysha;
        DB::table('prayers')->insert($data);
        return redirect()->back();
    }
    public function PrayerSettingEdit($id){
        $prayers=DB::table('prayers')->where('id',$id)->first();
        return view('backend.setting.prayer.edit',compact('prayers'));
    }
    public function PrayerUpdate(Request $request,$id){
        $data=array();
        $data['bayany']=$request->bayany;
        $data['khorhalatn']=$request->khorhalatn;
        $data['nywaro']=$request->nywaro;
        $data['asr']=$request->asr;
        $data['maxrib']=$request->maxrib;
        $data['aysha']=$request->aysha;
        DB::table('prayers')->where('id',$id)->update($data);
        return redirect()->back();
    }
    public function PrayerSettingDelete($id){
        DB::table('prayers')->where('id',$id)->delete();
        return redirect()->back();
    }


    //liveTv

    public function LiveTvSettingIndex(){
        $livetvs=DB::table('livetvs')->get();
        return view('backend.setting.livetv.index',compact('livetvs'));
    }
    public function LiveTvSettingCreate(){
        return view('backend.setting.livetv.create');
    }
    public function LiveTvSettingStore(Request $request){
        $data=array();
        $data['embed_code']=$request->embed_code;
        DB::table('livetvs')->insert($data);
        return redirect()->back();
    }
    public function LiveTvSettingDelete($id){
        DB::table('livetvs')->where('id',$id)->delete();
        return redirect()->back();
    }
    public function LivetvSettingEdit($id){
        $livetvs=DB::table('livetvs')->where('id',$id)->first();
        return view('backend.setting.livetv.edit',compact('livetvs'));
    }
    public function LivetvUpdate(Request $request,$id){
        $data=array();
        $data['embed_code']=$request->embed_code;
        DB::table('livetvs')->where('id',$id)->update($data);
        return redirect()->route('Setting.LiveTv.index');
    }
    public function LiveTvSettingActive($id){
        $data=array();
        $data['status']=1;
        DB::table('livetvs')->where('id',$id)->update($data);
        return redirect()->back();
    }
    public function LiveTvSettingDeActive($id){
        $data=array();
        $data['status']=0;
        DB::table('livetvs')->where('id',$id)->update($data);
        return redirect()->back();
    }


      //Notices

    public function NoticesSettingIndex(){
        $notices=DB::table('notices')->get();
        return view('backend.setting.notice.index',compact('notices'));
    }
    public function NoticesSettingCreate(){
        return view('backend.setting.notice.create');
    }
    public function NoticesSettingStore(Request $request){
        $data=array();
        $data['notices']=$request->notices;
        DB::table('notices')->insert($data);
        return redirect()->route('Setting.Notices.index');
    }
    public function NoticesSettingDelete($id){
        DB::table('notices')->where('id',$id)->delete();
        return redirect()->back();
    }
    public function NoticesSettingEdit($id){
        $notices=DB::table('notices')->where('id',$id)->first();
        return view('backend.setting.notice.edit',compact('notices'));
    }
    public function NoticesUpdate(Request $request,$id){
        $data=array();
        $data['notices']=$request->notices;
        DB::table('notices')->where('id',$id)->update($data);
        return redirect()->route('Setting.Notices.index');
    }
    public function NoticesSettingActive($id){
        $data=array();
        $data['status']=1;
        DB::table('notices')->where('id',$id)->update($data);
        return redirect()->back();
    }
    public function NoticesSettingDeActive($id){
        $data=array();
        $data['status']=0;
        DB::table('notices')->where('id',$id)->update($data);
        return redirect()->back();
    }


    //Website
    public function WebsiteSettingIndex(){
        $websites=DB::table('websites')->get();
        return view('backend.setting.website.index',compact('websites'));
    }
    public function WebsiteSettingCreate(){
        return view('backend.setting.website.create');
    }
    public function WebsiteSettingStore(Request $request){
        $data=array();
        $data['website_name']=$request->website_name;
        $data['website_link']=$request->website_link;
        DB::table('websites')->insert($data);
        return redirect()->route('Setting.Website.index');
    }
    public function WebsiteSettingDelete($id){
        DB::table('websites')->where('id',$id)->delete();
        return redirect()->back();
    }
    public function WebsiteSettingEdit($id){
        $websites=DB::table('websites')->where('id',$id)->first();
        return view('backend.setting.website.edit',compact('websites'));
    }
    public function WebsiteUpdate(Request $request,$id){
        $data=array();
        $data['website_name']=$request->website_name;
        $data['website_link']=$request->website_link;
        DB::table('websites')->where('id',$id)->update($data);
        return redirect()->route('Setting.Website.index');
    }
}
