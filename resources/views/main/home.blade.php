@extends('main.home_master')
@section('content')


	<!-- 1st-news-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9 col-sm-8">
					<div class="row">
						<div class="col-md-1 col-sm-1 col-lg-1"></div>
						<div class="col-md-10 col-sm-10">
							<div class="lead-news">
								@php 
									$first_section_bigthubnail=DB::table('posts')->where('first_section_thumbnail',1)->orderBy('id','desc')->first();
								@endphp
	 <div class="service-img"><a href="{{route('single_page',$first_section_bigthubnail->id)}}"><img src="{{asset($first_section_bigthubnail->image)}}" width="800px" alt="Notebook"></a></div>
								<div class="content">
		 <h4 class="lead-heading-01"><a href="{{route('single_page',$first_section_bigthubnail->id)}}">
			 
				@if(session()->get('lang')=='hindi')
					{{$first_section_bigthubnail->title_en }}
					@else
					{{$first_section_bigthubnail->title_en }}
					@endif
			
						</a> </h4>
								</div>
							</div>
						</div>
						
					</div>


								@php 
									$first_sections=DB::table('posts')->where('first_section',1)->orderBy('id','desc')->limit(8)->get();
								@endphp
						<div class="row">
							@foreach($first_sections as $first_section)
								<div class="col-md-3 col-sm-3">
									<div class="top-news">
										<a href="{{route('single_page',$first_section->id)}}"><img src="{{asset($first_section->image)}}" alt="Notebook"></a>
										<h4 class="heading-02"><a href="{{route('single_page',$first_section->id)}}">
										@if(session()->get('lang')=='hindi')
										{{$first_section->title_en }}
										@else
										{{$first_section->title_en }}
										@endif
										</a> </h4>
									</div>
								</div>
								@endforeach
							</div>
					
					<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="add"><img src="{{asset('Frontend/assets/img/top-ad.jpg')}}" alt="" /></div>
						</div>
					</div><!-- /.add-close -->	
					
					<!-- news-start -->
					<div class="row">
					@php 
						$FirstCategoryids=DB::table('categories')->limit(2)->get();
						@endphp
						@foreach($FirstCategoryids as $FirstCategoryid)
						@php
						$postsnewsbig=DB::table('posts')
						->where('category_id',$FirstCategoryid->id)
						->where('bigthumbnail',1)
						->orderBy('id','desc')->first();

						$postsnewssmall=DB::table('posts')
						->where('category_id',$FirstCategoryid->id)
						->whereNull('bigthumbnail')
						->orderBy('id','desc')->limit(3)->get();
					@endphp
						<div class="col-md-6 col-sm-6">
							<div class="bg-one">
								<div class="cetagory-title"><a href="#">
								@if(session()->get('lang')=='hindi')
								{{$FirstCategoryid->category_hin}}
										@else
										{{$FirstCategoryid->category_en}}
										@endif
									 <span>More <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="top-news">
											<a href="{{route('single_page',$postsnewsbig->id)}}"><img src="{{asset($postsnewsbig->image)}}" alt="Notebook"></a>
											<h4 class="heading-02"><a href="{{route('single_page',$postsnewsbig->id)}}">
											@if(session()->get('lang')=='hindi')
											{{Str::limit($postsnewsbig->title_hin,40)}}
										@else
										{{Str::limit($postsnewsbig->title_en,40)}}
										@endif	
											</a> </h4>
										</div>
									</div>

									<div class="col-md-6 col-sm-6">
										@foreach($postsnewssmall as $row)
										<div class="image-title">
											<a href="{{route('single_page',$row->id)}}"><img src="{{asset($row->image)}}" alt="Notebook"></a>
											<h4 class="heading-03"><a href="{{route('single_page',$row->id)}}">
											@if(session()->get('lang')=='hindi')
											{{Str::limit($row->title_hin,20)}}
										@else
										{{Str::limit($row->title_en,20)}}
										@endif	
											</a> </h4>
										</div>
										@endforeach
									</div>

								</div>
							</div>
						</div>
						@endforeach		
					</div>	
					
					

				</div>
				<div class="col-md-3 col-sm-3">
					<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add"><img src="{{asset('Frontend/assets/img/add_01.jpg')}}" alt="" /></div>
						</div>
					</div><!-- /.add-close -->	
					
					<!-- youtube-live-start -->	
					<div class="cetagory-title-03">Live TV</div>
					<div class="photo">
						<div class="embed-responsive embed-responsive-16by9 embed-responsive-item" style="margin-bottom:5px;">
						@php
 								$livetvs=DB::table('livetvs')->first();
							@endphp
							@if($livetvs->status==1)
							{!! $livetvs->embed_code !!}
							@endif
						</div>
					</div><!-- /.youtube-live-close -->	
					
					<!-- facebook-page-start -->
					<div class="cetagory-title-03">Facebook </div>
					<div class="fb-root">
						facebook page here
					</div><!-- /.facebook-page-close -->	
					
					<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add">
								<img src="{{asset('Frontend/assets/img/add_01.jpg')}}" alt="" />
							</div>
						</div>
					</div><!-- /.add-close -->	
				</div>
			</div>
		</div>
	</section><!-- /.1st-news-section-close -->


					

	<!-- 2nd-news-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
			@php 
						$SecondCategoryids=DB::table('categories')->limit(4)->get();
						@endphp
						@foreach($SecondCategoryids as $SecondCategoryid)
						@php
						$postsnewsbig=DB::table('posts')
						->where('category_id',$SecondCategoryid->id)
						->where('bigthumbnail',1)
						->orderBy('id','desc')->first();

						$postsnewssmall=DB::table('posts')
						->where('category_id',$SecondCategoryid->id)
						->whereNull('bigthumbnail')
						->orderBy('id','desc')->limit(3)->get();
					@endphp
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02"><a href="#">
										@if(session()->get('lang')=='hindi')
										{{Str::limit($SecondCategoryid->category_hin,20)}} 
										@else
										{{Str::limit($SecondCategoryid->category_en,20)}} 
										@endif
						
						
						<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>All News  </span></a></div>
						<div class="row">
						@if($postsnewsbig)
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									<a href="{{route('single_page',$postsnewsbig->id)}}"><img src="{{asset($postsnewsbig->image)}}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="{{route('single_page',$postsnewsbig->id)}}">
									@if(session()->get('lang')=='hindi')
									{{Str::limit($postsnewsbig->title_hin,10)}} 
										@else
										{{Str::limit($postsnewsbig->title_en,10)}} 
										@endif
									</a> </h4>
								</div>
							</div>
							@endif
							<div class="col-md-6 col-sm-6">
							@if($postsnewssmall)
								@foreach($postsnewssmall as $row)
								<div class="image-title">
									<a href="{{route('single_page',$row->id)}}"><img src="{{asset($row->image)}}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="{{route('single_page',$row->id)}}">
									@if(session()->get('lang')=='hindi')
									{{Str::limit($row->title_hin,15)}} 
										@else
										{{Str::limit($row->title_en,15)}} 
										@endif
									</a> </h4>
								</div>
								@endforeach
								@endif
							</div>
						</div>
					</div>
				</div>


				@endforeach
							
			<!-- add-start -->	
			<br>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="add"><img src="{{asset('Frontend/assets/img/top-ad.jpg')}}" alt="" /></div>
				</div>
			</div><!-- /.add-close -->	
			
		</div>
	</section><!-- /.2nd-news-section-close -->



	<!-- 3rd-news-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9 col-sm-9">
					<div class="cetagory-title-02"><a href="#">Feature  <i class="fa fa-angle-right" aria-hidden="true"></i> all district news tab here <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>
					
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<div class="top-news">
								<a href="#"><img src="{{asset('Frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
								<h4 class="heading-02"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="image-title">
								<a href="#"><img src="{{asset('Frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
							<div class="image-title">
								<a href="#"><img src="{{asset('Frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
							<div class="image-title">
								<a href="#"><img src="{{asset('Frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="image-title">
								<a href="#"><img src="{{asset('Frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
							<div class="image-title">
								<a href="#"><img src="{{asset('Frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
							<div class="image-title">
								<a href="#"><img src="{{asset('Frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
						</div>
					</div>
					<!-- ******* -->
					<br />
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="cetagory-title-02"><a href="#">Sci-Tech<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> সব খবর  </span></a></div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="bg-gray">
								<div class="top-news">
									<a href="#"><img src="{{asset('Frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="#">Facebook Messenger gets shiny new logo </a> </h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo</a>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add">
								<img src="{{asset('Frontend/assets/img/top-ad.jpg')}}" alt="" />
							</div>
						</div>
					</div><!-- /.add-close -->	


				</div>
				<div class="col-md-3 col-sm-3">
					<div class="tab-header">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs nav-justified" role="tablist">
							<li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">Latest</a></li>
							<li role="presentation" ><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">Popular</a></li>
							<li role="presentation" ><a href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab" aria-expanded="true">Popular1</a></li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content ">
							<div role="tabpanel" class="tab-pane in active" id="tab21">
								<div class="news-titletab">
									@php
										$latest=DB::table('posts')->limit(5)->orderBy('id','desc')->get();
									@endphp
									@foreach($latest as $row)
									<div class="news-title-02">
										<h4 class="heading-03"><a href="{{route('single_page',$row->id)}}">
										@if(session()->get('lang')=='hindi')
										{{Str::limit($row->title_hin,25)}}
										@else
										{{Str::limit($row->title_en,25)}}
										@endif
											
										</a> </h4>
									</div>
									@endforeach
								</div>
							</div>

							<div role="tabpanel" class="tab-pane fade" id="tab22">
								<div class="news-titletab">
									@php
										$popular=DB::table('posts')->inRandomOrder()->limit(5)->orderBy('id','asc')->get();
									@endphp
									@foreach($popular as $row)
									<div class="news-title-02">
										<h4 class="heading-03"><a href="{{route('single_page',$row->id)}}">
										@if(session()->get('lang')=='hindi')
										{{Str::limit($row->title_hin,25)}}
										@else
										{{Str::limit($row->title_en,25)}}
										@endif
										</a> </h4>
									</div>
									@endforeach
								</div>                                          
							</div>

							<div role="tabpanel" class="tab-pane fade" id="tab23">	
								<div class="news-titletab">
									@php
										$popular1=DB::table('posts')->inRandomOrder()->limit(5)->orderBy('id','desc')->get();
									@endphp
									@foreach($popular1 as $row)
									<div class="news-title-02">
										<h4 class="heading-03"><a href="{{route('single_page',$row->id)}}">
										@if(session()->get('lang')=='hindi')
										{{Str::limit($row->title_hin,25)}}
										@else
										{{Str::limit($row->title_en,25)}}
										@endif
									</a> </h4>
									</div>
									@endforeach
								</div>						                                          
							</div>
						</div>
					</div>
					<!-- Namaj Times -->
					<div class="cetagory-title-03">Prayer Time </div>
							@php
 								$prayers=DB::table('prayers')->first();
							@endphp
					<table class="table">
						<tr>
							<th>Fajr</th>
							<th>{{$prayers->bayany}}</th>
						</tr>
						<tr>
							<th>Khorhalatn</th>
							<th>{{$prayers->khorhalatn}}</th>
						</tr>
						<tr>
							<th>Aywaro</th>
							<th>{{$prayers->nywaro}}</th>
						</tr>
						<tr>
							<th>Asr</th>
							<th>{{$prayers->asr}}</th>
						</tr>
						<tr>
							<th>Maxrib</th>
							<th>{{$prayers->maxrib}}</th>
						</tr>
						<tr>
							<th>Aysha</th>
							<th>{{$prayers->aysha}}</th>
						</tr>
					</table>
					<!-- Namaj Times -->
					<div class="cetagory-title-03">Old News  </div>
					<form action="" method="post">
						<div class="old-news-date">
						   <input type="text" name="from" placeholder="From Date" required="">
						   <input type="text" name="" placeholder="To Date">			
						</div>
						<div class="old-date-button">
							<input type="submit" value="search ">
						</div>
				   </form>
				   <!-- news -->
				   <br><br><br><br><br>
				   <div class="cetagory-title-04"> Important Website</div>
				   <div class="">

					   @php
 						$websites=DB::table('websites')->get();
						@endphp
						@foreach($websites as $row)
						<div class="news-title-02">
				   			<h4 class="heading-03"><a href="{{$row->website_link}}"><i class="fa fa-check" aria-hidden="true"></i> {{$row->website_name}}  </a> </h4>
				   		</div>
						@endforeach
				   </div>

				</div>
			</div>
		</div>
	</section><!-- /.3rd-news-section-close -->
	


	


	


	<!-- gallery-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-sm-7">
					<div class="gallery_cetagory-title"> Photo Gallery </div>

					<div class="row">
	                    <div class="col-md-8 col-sm-8">
	                        <div class="photo_screen">
								@php
									$bigimage=DB::table('photos')->where('type',1)->orderBy('id','desc')->first();
								@endphp
	                            <div class="myPhotos" style="width:100%">
                                      <img src="{{asset($bigimage->photo)}}"  alt="Avatar">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-4 col-sm-4">
	                        <div class="photo_list_bg">
								@php
									$smallimage=DB::table('photos')->where('type',0)->orderBy('id','desc')->limit(5)->get();
								@endphp
								@foreach($smallimage as $row)
	                            <div class="photo_img photo_border">
	                                <img src="{{asset($row->photo)}}" alt="image" onclick="currentDiv(1)">
	                                <div class="heading-03">
	                                   {{$row->title}}
	                                </div>
	                            </div>
								@endforeach

	                        </div>
	                    </div>
	                </div>

	                <!--=======================================
                    Video Gallery clickable jquary  start
                ========================================-->

                            <script>
                                    var slideIndex = 1;
                                    showDivs(slideIndex);

                                    function plusDivs(n) {
                                      showDivs(slideIndex += n);
                                    }

                                    function currentDiv(n) {
                                      showDivs(slideIndex = n);
                                    }

                                    function showDivs(n) {
                                      var i;
                                      var x = document.getElementsByClassName("myPhotos");
                                      var dots = document.getElementsByClassName("demo");
                                      if (n > x.length) {slideIndex = 1}
                                      if (n < 1) {slideIndex = x.length}
                                      for (i = 0; i < x.length; i++) {
                                         x[i].style.display = "none";
                                      }
                                      for (i = 0; i < dots.length; i++) {
                                         dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                                      }
                                      x[slideIndex-1].style.display = "block";
                                      dots[slideIndex-1].className += " w3-opacity-off";
                                    }
                                </script>

                <!--=======================================
                    Video Gallery clickable  jquary  close
                =========================================-->

				</div>
				<div class="col-md-4 col-sm-5">
					<div class="gallery_cetagory-title"> photo Gallery </div>

					<div class="row">
                        <div class="col-md-12 col-sm-12">
							@php
									$lastvideo=DB::table('videos')->where('type',1)->orderBy('id','desc')->first();
							@endphp
                            <div class="video_screen">
                                <div class="myVideos" style="width:100%">
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                    {!! $lastvideo->video_link !!}
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                       		 @php
									$lastImg=DB::table('photos')->where('type',0)->orderBy('id','desc')->limit(4)->get();
							@endphp
                            <div class="gallery_sec owl-carousel">
									@foreach($lastImg as $row)
                                <div class="video_image" style="width:100%" onclick="currentDivs(1)">
								<img src="{{ $row->photo }}" alt="Avatar">
                                    <div class="heading-03">
                                        <div class="content_padding">
										{{ $row->title }}
                                        </div>
                                    </div>
                                </div>
									@endforeach

                            </div>
                        </div>
                    </div>


                    <script>
                        var slideIndex = 1;
                        showDivss(slideIndex);

                        function plusDivs(n) {
                          showDivss(slideIndex += n);
                        }

                        function currentDivs(n) {
                          showDivss(slideIndex = n);
                        }

                        function showDivss(n) {
                          var i;
                          var x = document.getElementsByClassName("myVideos");
                          var dots = document.getElementsByClassName("demo");
                          if (n > x.length) {slideIndex = 1}
                          if (n < 1) {slideIndex = x.length}
                          for (i = 0; i < x.length; i++) {
                             x[i].style.display = "none";
                          }
                          for (i = 0; i < dots.length; i++) {
                             dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                          }
                          x[slideIndex-1].style.display = "block";
                          dots[slideIndex-1].className += " w3-opacity-off";
                        }
                    </script>

				</div>
			</div>
		</div>
	</section><!-- /.gallery-section-close -->



@endsection
