@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                  <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                      <div class="col-4 col-sm-3 col-xl-2">
                        <img src="{{asset('backend/assets/images/dashboard/Group126@2x.png')}}" class="gradient-corona-img img-fluid" alt="">
                      </div>
                      <div class="col-5 col-sm-7 col-xl-8 p-0">
                        <h4 class="mb-1 mb-sm-0">Want even more features?</h4>
                        <p class="mb-0 font-weight-normal d-none d-sm-block">Check out our Pro version with 5 unique layouts!</p>
                      </div>
                      <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                        <span>
                          <a href="https://www.bootstrapdash.com/product/corona-admin-template/" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Upgrade to PRO</a>
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
                    <h4 class="card-title">Subcategories Page</h4>
                    <a href="{{route('subdistrict.create')}}" class="btn btn-primary" style="float: right;">Add SubCategory</a>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Districts Name</th>
                            <th> Districts English </th>
                            <th> Districts Hindi </th>
                            <th> Districts </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($subdistricts as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->district_en}}</td>
                                    <td>{{$row->subdistrict_en}}</td>
                                    <td>{{$row->subdistrict_hin}}</td>
                                    <td>
                                        <a href="{{route('subdistrict.edit',$row->id)}}" class="btn btn-primary">Edite</a>
                                        <a href="{{route('subdistrict.delete',$row->id)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody> 
                      </table>
                      {{$subdistricts->links('pagination')}}
                    </div>
                  </div>
                </div>
            </div>
            </div>

@endsection