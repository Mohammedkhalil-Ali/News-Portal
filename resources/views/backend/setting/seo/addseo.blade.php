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
                    <h4 class="card-title">Socials</h4>
                    <form class="forms-sample" method="POST" action="{{route('Setting.Seo.store')}}">
                      @csrf

                      <div class="form-group col-md-6">
                        <label for="meta_author">meta_author</label>
                        <input type="text" class="form-control" id="meta_author" placeholder="meta_author" name="meta_author">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="meta_title">meta_title</label>
                        <input type="text" class="form-control" id="meta_title" placeholder="meta_title" name="meta_title">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="meta_keyword">meta_keyword</label>
                        <input type="text" class="form-control" id="meta_keyword" placeholder="meta_keyword" name="meta_keyword">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="meta_description">meta_description</label>
                        <input type="text" class="form-control" id="meta_description" placeholder="meta_description" name="meta_description">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="google_analytics">google_analytics</label>
                        <input type="text" class="form-control" id="google_analytics" placeholder="google_analytics" name="google_analytics">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="google_verification">google_verification</label>
                        <input type="text" class="form-control" id="google_verification" placeholder="google_verification" name="google_verification">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="alexa_analytics">alexa_analytics</label>
                        <input type="text" class="form-control" id="alexa_analytics" placeholder="alexa_analytics" name="alexa_analytics">
                      </div>
                 

                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>

</div>


@endsection