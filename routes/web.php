<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\AdsController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\DistrictController;
use App\Http\Controllers\backend\GalleryController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\SubcategoryController;
use App\Http\Controllers\backend\SubdistrictController;
use App\Http\Controllers\backend\SettingController;
use App\Http\Controllers\frontend\ExtraController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main.home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/logout',[AdminController::class,'logout'])->name('logout');

//Category
Route::get('/category',[CategoryController::class,'index'])->name('Allcategory');
Route::get('/category/createcategory',[CategoryController::class,'create'])->name('category/createcategory');
Route::post('/category/Storecategory',[CategoryController::class,'Addcategory'])->name('Addcategory');
Route::get('/category/Editecategory/{id}',[CategoryController::class,'Edite'])->name('category.Edite');
Route::post('/category/Updatecategory/{id}',[CategoryController::class,'Update'])->name('Updatecategory');
Route::get('/category/Deletecategory/{id}',[CategoryController::class,'Delete'])->name('category.Delete');


//subCategory
Route::get('/subcategory',[SubcategoryController::class,'index'])->name('Allsubcategory');
Route::get('/Subcategory/CreateSubcategory',[SubcategoryController::class,'create'])->name('subcategories.create');
Route::post('/Subcategory/Storecategory',[SubcategoryController::class,'Addcategory'])->name('subcategories.store');
Route::get('/Subcategory/Editecategory/{id}',[SubcategoryController::class,'Edit'])->name('subcategory.edit');
Route::post('/Subcategory/Updatecategory/{id}',[SubcategoryController::class,'Update'])->name('subcategory.update');
Route::get('/Subcategory/Deletecategory/{id}',[SubcategoryController::class,'Delete'])->name('subcategory.delete');


//district
Route::get('/district',[DistrictController::class,'index'])->name('Alldistrict');
Route::get('/district/createdistrict',[DistrictController::class,'create'])->name('district.create');
Route::post('/district/Storedistrict',[DistrictController::class,'Adddistrict'])->name('district.store');
Route::get('/district/Editedistrict/{id}',[DistrictController::class,'Edite'])->name('district.edit');
Route::post('/district/Updatedistrict/{id}',[DistrictController::class,'Update'])->name('district.update');
Route::get('/district/Deletedistrict/{id}',[DistrictController::class,'Delete'])->name('district.delete');


//subDistrict
Route::get('/subdistrict',[SubdistrictController::class,'index'])->name('Allsubdistrict');
Route::get('/subdistrict/Createsubdistrict',[SubdistrictController::class,'create'])->name('subdistrict.create');
Route::post('/subdistrict/Storesubdistrict',[SubdistrictController::class,'Adddistrict'])->name('subdistrict.store');
Route::get('/subdistrict/Editesubdistrict/{id}',[SubdistrictController::class,'Edit'])->name('subdistrict.edit');
Route::post('/subdistrict/Updatesubdistrict/{id}',[SubdistrictController::class,'Update'])->name('subdistrict.update');
Route::get('/subdistrict/Deletesubdistrict/{id}',[SubdistrictController::class,'Delete'])->name('subdistrict.delete');


//Post
Route::get('/AllPost',[PostController::class,'index'])->name('post.index');
Route::get('/AddPost',[PostController::class,'create'])->name('post.create');
Route::post('/AddPostToDB',[PostController::class,'store'])->name('post.store');
Route::get('/editPost/{id}',[PostController::class,'edit'])->name('post.edit');
Route::post('/UpdatePost/{id}',[PostController::class,'update'])->name('post.update');
Route::get('/DeletePost/{id}',[PostController::class,'delete'])->name('post.delete');

//Ajax
Route::get('/Addsubcategory/{id}',[PostController::class,'Getsubcategory']);
Route::get('/Addsubdistrict/{id}',[PostController::class,'Getsubdistrict']);


//SettingSocial
Route::get('/AllSocial',[SettingController::class,'SocialSettingIndex'])->name('Setting.Social.index');
Route::get('/SocialsCreate',[SettingController::class,'SocialSettingCreate'])->name('Setting.Social.create');
Route::post('/SocialAdd',[SettingController::class,'SocialSettingStore'])->name('Setting.Social.store');
Route::get('/SocialCreate/{id}',[SettingController::class,'SocialSetting'])->name('Setting.Social.edit');
Route::post('/Socials/Update/{id}',[SettingController::class,'SocialUpdate'])->name('Social.update');
Route::get('/SocialDelete/{id}',[SettingController::class,'SocialSettingDelete'])->name('Setting.Social.delete');


//SettingSeo
Route::get('/AllSeo',[SettingController::class,'SeoSettingIndex'])->name('Setting.Seo.index');
Route::get('/SeoCreate',[SettingController::class,'SeoSettingCreate'])->name('Setting.Seo.create');
Route::post('/SeolAdd',[SettingController::class,'SeoSettingStore'])->name('Setting.Seo.store');
Route::get('/SeoCreate/{id}',[SettingController::class,'SeoSettingEdit'])->name('Setting.Seo.edit');
Route::post('/Seos/Update/{id}',[SettingController::class,'SeoUpdate'])->name('Seo.update');
Route::get('/SeoDelete/{id}',[SettingController::class,'SeoSettingDelete'])->name('Setting.Seo.delete');


//SettingPrayer
Route::get('/AllPrayer',[SettingController::class,'PrayerSettingIndex'])->name('Setting.Prayer.index');
Route::get('/PrayerCreate',[SettingController::class,'PrayerSettingCreate'])->name('Setting.Prayer.create');
Route::post('/PrayerlAdd',[SettingController::class,'PrayerSettingStore'])->name('Setting.Prayer.store');
Route::get('/PrayerCreate/{id}',[SettingController::class,'PrayerSettingEdit'])->name('Setting.Prayer.edit');
Route::post('/Prayer/Update/{id}',[SettingController::class,'PrayerUpdate'])->name('Prayer.update');
Route::get('/PrayerDelete/{id}',[SettingController::class,'PrayerSettingDelete'])->name('Setting.Prayer.delete');


//SettingLiveTv
Route::get('/AllTv',[SettingController::class,'LiveTvSettingIndex'])->name('Setting.LiveTv.index');
Route::get('/LiveCreate',[SettingController::class,'LiveTvSettingCreate'])->name('Setting.LiveTv.create');
Route::post('/LivetvlAdd',[SettingController::class,'LiveTvSettingStore'])->name('Setting.LiveTv.store');
Route::get('/LivetvCreate/{id}',[SettingController::class,'LivetvSettingEdit'])->name('Setting.Livetv.edit');
Route::post('/Livetv/Update/{id}',[SettingController::class,'LivetvUpdate'])->name('Livetv.update');
Route::get('/LiveTvDelete/{id}',[SettingController::class,'LiveTvSettingDelete'])->name('Setting.LiveTv.delete');
Route::get('/LiveTvActive/{id}',[SettingController::class,'LiveTvSettingActive'])->name('Setting.LiveTv.Active');
Route::get('/LiveTvDeActive/{id}',[SettingController::class,'LiveTvSettingDeActive'])->name('Setting.LiveTv.DeActive');


//SettingNotices
Route::get('/AllNotices',[SettingController::class,'NoticesSettingIndex'])->name('Setting.Notices.index');
Route::get('/NoticesCreate',[SettingController::class,'NoticesSettingCreate'])->name('Setting.Notices.create');
Route::post('/NoticeslAdd',[SettingController::class,'NoticesSettingStore'])->name('Setting.Notices.store');
Route::get('/NoticesCreate/{id}',[SettingController::class,'NoticesSettingEdit'])->name('Setting.Notices.edit');
Route::post('/Notices/Update/{id}',[SettingController::class,'NoticesUpdate'])->name('Notices.update');
Route::get('/NoticesDelete/{id}',[SettingController::class,'NoticesSettingDelete'])->name('Setting.Notices.delete');
Route::get('/NoticesActive/{id}',[SettingController::class,'NoticesSettingActive'])->name('Setting.Notices.Active');
Route::get('/NoticesDeActive/{id}',[SettingController::class,'NoticesSettingDeActive'])->name('Setting.Notices.DeActive');


//SettingWebsite
Route::get('/AllWebsite',[SettingController::class,'WebsiteSettingIndex'])->name('Setting.Website.index');
Route::get('/WebsiteCreate',[SettingController::class,'WebsiteSettingCreate'])->name('Setting.Website.create');
Route::post('/WebsiteAdd',[SettingController::class,'WebsiteSettingStore'])->name('Setting.Website.store');
Route::get('/WebsiteCreate/{id}',[SettingController::class,'WebsiteSettingEdit'])->name('Setting.Website.edit');
Route::post('/Website/Update/{id}',[SettingController::class,'WebsiteUpdate'])->name('Website.update');
Route::get('/WebsiteDelete/{id}',[SettingController::class,'WebsiteSettingDelete'])->name('Setting.Website.delete');


//Gallery
Route::get('/Gallery',[GalleryController::class,'index'])->name('gallery.index');
Route::get('/GalleryCreate',[GalleryController::class,'GalleryCreate'])->name('gallery.create');
Route::post('/GalleryStore',[GalleryController::class,'GalleryStore'])->name('gallery.store');
Route::get('/GalleryCreate/{id}',[GalleryController::class,'GalleryEdit'])->name('gallery.edit');
Route::post('/Gallery/Update/{id}',[GalleryController::class,'GalleryUpdate'])->name('gallery.update');
Route::get('/GalleryDelete/{id}',[GalleryController::class,'GalleryDelete'])->name('gallery.delete');


//GalleryVideo
Route::get('/Gallery/video',[GalleryController::class,'indexVideo'])->name('galleryVideo.index');
Route::get('/GalleryCreateVideo',[GalleryController::class,'GalleryCreateVideo'])->name('galleryVideo.create');
Route::post('/GalleryStoreVideo',[GalleryController::class,'GalleryStoreVideo'])->name('galleryVideo.store');
Route::get('/GalleryCreateVideo/{id}',[GalleryController::class,'GalleryEditVideo'])->name('galleryVideo.edit');
Route::post('/Gallery/UpdateVideo/{id}',[GalleryController::class,'GalleryUpdateVideo'])->name('galleryVideo.update');
Route::get('/GalleryDeleteVideo/{id}',[GalleryController::class,'GalleryDeleteVideo'])->name('galleryVideo.delete');


//ExtraController
Route::get('/lang/english',[ExtraController::class,'English'])->name('english.lang');
Route::get('/lang/hindi',[ExtraController::class,'Hindi'])->name('hindi.lang');
Route::get('/singlepage/{id}',[ExtraController::class,'SinglePage'])->name('single_page');


//CategoryPage
Route::get('Category/Page/{id}/{categoryName}',[ExtraController::class,'GotoCategoryPage'])->name('CategoryPage');
Route::get('SubCategory/Page/{id}/{subcategoryName}',[ExtraController::class,'GotoSubCategoryPage'])->name('SubCategoryPage');


//Ads
Route::get('/Ads',[AdsController::class,'index'])->name('Ads.index');
Route::get('/Ads/create',[AdsController::class,'create'])->name('Ads.create');
Route::post('/Ads/store',[AdsController::class,'store'])->name('Ads.store');
Route::get('/Ads/edit/{id}',[AdsController::class,'edit'])->name('Ads.edit');
Route::post('/Ads/update/{id}',[AdsController::class,'update'])->name('Ads.update');
Route::get('/Ads/delete/{id}',[AdsController::class,'delete'])->name('Ads.delete');


//Role
Route::get('/Role',[RoleController::class,'index'])->name('Role.index');
Route::get('/Role/create',[RoleController::class,'create'])->name('Role.create');
Route::post('/Role/store',[RoleController::class,'store'])->name('Role.store');
Route::get('/Role/edit/{id}',[RoleController::class,'edit'])->name('Role.edit');
Route::post('/Role/update/{id}',[RoleController::class,'update'])->name('Role.update');
Route::get('/Role/delete/{id}',[RoleController::class,'delete'])->name('Role.delete');