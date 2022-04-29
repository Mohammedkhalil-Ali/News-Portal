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
<div class="col-lg-12 grid-margin strech-card">
<div class="card">
                  <div class="card-body">
                    <h4 class="card-title">District Page</h4>
                    <a href="{{route('district.create')}}" class="btn btn-primary" style="float: right;">Add district</a>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> district_en </th>
                            <th> district_hin </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($districts as $district)
                                <tr>
                                    <td>{{$district->id}}</td>
                                    <td>{{$district->district_en}}</td>
                                    <td>{{$district->district_hin}}</td>
                                    <td>
                                        <a href="{{route('district.edit',$district->id)}}" class="btn btn-primary">Edite</a>
                                        <a href="{{route('district.delete',$district->id)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody> 
                      </table>
                     {{$districts->links('pagination')}}
                    </div>
                  </div>
                </div>
            </div>
            </div>
                @endsection