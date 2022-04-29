@extends('admin.admin_master')
@section('admin')

@php
$subcat=DB::table('subcategories')->where('category_id',$posts->category_id)->get();
$subdis=DB::table('subdistricts')->where('district_id',$posts->district_id)->get();
@endphp
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                  <div class="card-body py-2 px-2 px-sm-3">
                    <div class="row align-items-center">
                      <div class="col-4 col-sm-3 col-xl-2">
                        <img src="{{asset('backend/assets/images/dashboard/Group126@2x.png')}}" class="gradient-corona-img img-fluid" alt="">
                      </div>
                      <div class="col-5 col-sm-7 col-xl-8 p-0">
                        <h4 class="mb-1 mb-sm-0">Wellcome to Ease News</h4>
                      </div>
                      <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                        <span>
                          <a href="https://www.bootstrapdash.com/product/corona-admin-template/" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Visit Home</a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">New Post Insert</h4>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{route('post.update',$posts->id)}}">
                      @csrf
                        <div class="row">
                      <div class="form-group col-md-6">
                        <label for="exampleInputName1">Title English</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Title" name="title_en" value="{{ $posts->title_en }}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputName1">Title Hindi</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="title_hin" value="{{ $posts->title_hin }}">
                      </div>
                    </div>

                    <div class="row">
                    <div class="form-group col-md-6">
                        <label for="exampleSelectGender">Category</label>
                        <select class="form-control" id="category_id" name="category_id">
                          @foreach($categories as $row)
                          <option value="{{$row->id}}" <?php if($row->id == $posts->category_id){echo "selected";}   ?>>{{$row->category_en}}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="exampleSelectGender">Sub Category</label>
                        <select class="form-control" id="subcat_id" name="subcategory_id">
                        @foreach($subcat as $row)
                          <option value="{{$row->id}}" <?php if($row->id == $posts->subcategory_id){echo "selected";}   ?>>{{$row->subcategory_en}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="row">
                    <div class="form-group col-md-6">
                        <label for="exampleSelectGender">District</label>
                        <select class="form-control" id="district_id" name="district_id">
                        @foreach($districts as $row)
                          <option value="{{$row->id}}" <?php if($row->id == $posts->district_id){echo "selected";}   ?>>{{$row->district_en}}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="exampleSelectGender">Sub District</label>
                        <select class="form-control" id="subdistrict_id" name="subdistrict_id">
                        @foreach($subdis as $row)
                          <option value="{{$row->id}}" <?php if($row->id == $posts->subdistrict_id){echo "selected";}   ?>>{{$row->subdistrict_en}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="exampleInputName1">Tag English</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="tags_en" value="{{ $posts->tags_en }}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputName1">Tag Hindi</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="tags_hin" value="{{ $posts->tags_hin }}">
                      </div>
                    </div>
                      
                        <div class="form-group">
                            <label for="formFile" class="form-label">Default file input example</label>
                            <input class="form-control" type="file" id="formFile" name="image">
                        </div>
                        
                    <input type="hidden" name="imageOld" value="{{$posts->image}}">
                      
                        <div class="form-group">
                        <label for="summernote">Details English</label>
                            <textarea class="form-control" name="details_en" id="summernote"  value="{{ $posts->details_en }}">
                            {{ $posts->details_en }}
                            </textarea>
                        </div>

                        <div class="form-group">
                        <label for="summernote2">Details Hindi</label>
                            <textarea class="form-control" name="details_hin" id="summernote2" value="{{ $posts->details_hin }}">
                            {{ $posts->details_hin }}
                            </textarea>
                        </div>
                     
                        <div class="d-flex justify-content-center">
                            <h4>Extra Section</h4>
                        </div>
                        <div class="row mb-2">
                        <div class="form-check col-md-3">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="1" name="headline" <?php if($posts->headline==1) echo "checked"   ?>> Headline <i class="input-helper"></i></label>
                            </div>

                            <div class="form-check col-md-3">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="1" name="bigthumbnail" <?php if($posts->bigthumbnail==1) echo "checked"   ?>> General Big Thumbnail <i class="input-helper"></i></label>
                            </div>

                            <div class="form-check col-md-3">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="1" name="first_section" <?php if($posts->first_section==1) echo "checked"   ?>> First Section <i class="input-helper"></i></label>
                            </div>

                            <div class="form-check col-md-3">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="1" name="first_section_thumbnail" <?php if($posts->first_section_thumbnail==1) echo "checked"   ?>> Fist Section BigThumbnail <i class="input-helper"></i></label>
                            </div>
                        </div>
                        


                      <button type="submit" class="btn btn-primary mr-2">Update</button>
                    </form>
                  </div>
                </div>
              </div>

</div>
<script>
$(document).ready(function(){
 $('select[name="category_id"]').on('change',function(){
   var cat_id=$(this).val();
   if(cat_id){
     $.ajax({
       url:"{{url('/Addsubcategory')}}/"+cat_id,
       type:"GET",
      dataType:"json",
      success:function(data){
        $('#subcat_id').empty();
        $.each(data,function(key,value){
          $('#subcat_id').append('<option value="'+value.id+'">'+value.subcategory_en+'</option>')
        })
      }

     })
   }else{
     alert('danger');
   }
 });
});
</script>

<script>
$(document).ready(function(){
 $('select[name="district_id"]').on('change',function(){
   var district_id=$(this).val();
   if(cat_id){
     $.ajax({
       url:"{{url('/Addsubdistrict')}}/"+district_id,
       type:"GET",
      dataType:"json",
      success:function(data){
        $('#subdistrict_id').empty();
        $.each(data,function(key,value){
          $('#subcat_id').append('<option value="'+value.id+'">'+value.subdistrict_en+'</option>')
        })
      }

     })
   }else{
     alert('danger');
   }
 });
});
</script>

@endsection