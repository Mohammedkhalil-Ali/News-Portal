@extends('admin.admin_master')
@section('admin')

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
                    <h4 class="card-title">Edit</h4>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{route('gallery.update',$gallery->id)}}">
                      @csrf
                  
                      <div class="form-group col-md-6">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{$gallery->title}}">
                      </div>

                    <div class="form-group col-md-6">
                        <label for="type">Type</label>
                        <select class="form-control" id="type" name="type">
                        <option value="1">Big Image</option>
                        <option value="0">Small Image</option>
                        </select>
                      </div>

 
                         <div class="form-group">
                            <input class="" type="file" id="formFile" name="image">
                        </div>
                        <input type="hidden" name="oldimg" value="{{$gallery->photo}}">

                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>

</div>

@endsection