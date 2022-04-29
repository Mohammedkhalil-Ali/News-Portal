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



            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">New User Insert</h4>
                    <form class="forms-sample" method="POST" action="{{route('Role.store')}}">
                      @csrf
                  
                      <div class="form-group col-md-6">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="title" placeholder="Title" name="name">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="exampleInputName1">username</label>
                        <input type="email" class="form-control" id="title" placeholder="Title" name="email">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="exampleInputName1">password</label>
                        <input type="password" class="form-control" id="title" placeholder="Title" name="password">
                      </div>

                      <div class="d-flex justify-content-start">
                            <h4>Role</h4>
                        </div>
                        <div class="row mb-2">
                        <div class="form-check col-md-6">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" disabled> type <i class="input-helper"></i></label>
                            </div>

                            <div class="form-check col-md-6">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="1" name="category"> category <i class="input-helper"></i></label>
                            </div>

                            <div class="form-check col-md-6">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="1" name="district"> district <i class="input-helper"></i></label>
                            </div>

                            <div class="form-check col-md-6">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="1" name="setting"> setting <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check col-md-6">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="1" name="gallery"> gallery <i class="input-helper"></i></label>
                            </div>

                            <div class="form-check col-md-6">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="1" name="post"> post <i class="input-helper"></i></label>
                            </div>

                            <div class="form-check col-md-6">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="1" name="ads"> ads <i class="input-helper"></i></label>
                            </div>

                            <div class="form-check col-md-6">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="1" name="role"> role <i class="input-helper"></i></label>
                            </div>
                        </div>

                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>



</div>

@endsection