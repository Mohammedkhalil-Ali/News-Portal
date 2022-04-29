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
                    <h4 class="card-title">Prayer</h4>
                    <form class="forms-sample" method="POST" action="{{route('Setting.Prayer.store')}}">
                      @csrf

                      <div class="form-group col-md-6">
                        <label for="bayany">bayany</label>
                        <input type="text" class="form-control" id="bayany" placeholder="bayany" name="bayany">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="khorhalatn">khorhalatn</label>
                        <input type="text" class="form-control" id="khorhalatn" placeholder="khorhalatn" name="khorhalatn">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="nywaro">nywaro</label>
                        <input type="text" class="form-control" id="nywaro" placeholder="nywaro" name="nywaro">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="asr">asr</label>
                        <input type="text" class="form-control" id="asr" placeholder="asr" name="asr">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="maxrib">maxrib</label>
                        <input type="text" class="form-control" id="maxrib" placeholder="maxrib" name="maxrib">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="aysha">aysha</label>
                        <input type="text" class="form-control" id="aysha" placeholder="aysha" name="aysha">
                      </div>
                 

                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>

</div>


@endsection