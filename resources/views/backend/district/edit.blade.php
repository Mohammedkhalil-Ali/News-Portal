@extends('admin.admin_master')
@section('admin')
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


            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add District</h4>
                    <form method="POST" action="{{ route('district.update',$data->id) }}">
            @csrf
                    <div class="form-group">
                      <label>District English</label>
                      <input type="text" class="form-control form-control-lg" placeholder="District English" name="district_en" value="{{$data->district_en}}">
                      @error('district_en')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>District Hindi</label>
                      <input type="text" class="form-control" placeholder="District Hindi" name="district_hin" value="{{$data->district_hin}}">
                      @error('district_hin')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>
              </div>



</div>
@endsection