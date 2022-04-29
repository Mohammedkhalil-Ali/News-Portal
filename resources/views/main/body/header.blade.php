 @php
 $category=DB::table('categories')->get();
 @endphp
 <!-- header-start -->
 <section class="hdr_section">
		<div class="container-fluid">			
			<div class="row">
				<div class="col-xs-6 col-md-2 col-sm-4">
					<div class="header_logo">
						<a href=""><img src="{{asset('Frontend/assets/img/demo_logo.png')}}"></a> 
					</div>
				</div>              
				<div class="col-xs-6 col-md-8 col-sm-8">
					<div id="menu-area" class="menu_area">
						<div class="menu_bottom">
							<nav role="navigation" class="navbar navbar-default mainmenu">
						<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<!-- Collection of nav links and other content for toggling -->
								<div id="navbarCollapse" class="collapse navbar-collapse">
								
									<ul class="nav navbar-nav">
									<li><a href="{{url('/')}}">
											@if(session()->get('lang')=='hindi')	
											Home
											@else
											Home
											@endif
											</a></li>
										@foreach($category as $row)
										@php 
										$sub=DB::table('subcategories')->where('category_id',$row->id)->get();
 										@endphp	
										 @if($sub->count()>0)
										 <li class="dropdown">
											<a href="{{route('CategoryPage',[$row->id,$row->category_en])}}">
											@if(session()->get('lang')=='hindi')	
											{{$row->category_hin}}
											@else
											{{$row->category_en}}
											@endif
											<b class="caret"></b></a>
											<ul class="dropdown-menu">
											@foreach($sub as $rows)
												<li><a href="{{route('SubCategoryPage',[$rows->id,$rows->subcategory_en])}}">
												@if(session()->get('lang')=='hindi')	
												{{$rows->subcategory_hin}}
												@else
												{{$rows->subcategory_en}}
												@endif
											</a></li>
												@endforeach
											</ul>
											</li>
											@else
											<li><a href="">
											@if(session()->get('lang')=='hindi')	
											{{$row->category_hin}}
											@else
											{{$row->category_en}}
											@endif
											</a></li>
											@endif
											@endforeach
									</ul>	 
								</div>
							</nav>											
						</div>
					</div>					
				</div> 
				<div class="col-xs-12 col-md-2 col-sm-12">
					<div class="header-icon">
						<ul>
							<!-- version-start -->
							@if(session()->get('lang')=='hindi')
							<li class="version"><a href="{{route('english.lang')}}"><B>English</B></a></li>&nbsp;&nbsp;&nbsp;
							@else
							<li class="version"><a href="{{route('hindi.lang')}}"><B>Hindi</B></a></li>&nbsp;&nbsp;&nbsp;
 							@endif
							<!-- login-start -->
						
							<!-- search-start -->
							<li><div class="search-large-divice">
								<div class="search-icon-holder"> <a href="#" class="search-icon" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-search" aria-hidden="true"></i></a>
									<div class="modal fade bd-example-modal-lg" action="" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i class="fa fa-times-circle" aria-hidden="true"></i> </button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-md-12">
															<div class="custom-search-input">
																<form>
																	<div class="input-group">
																		<input class="search form-control input-lg" placeholder="search" value="Type Here.." type="text">
																		<span class="input-group-btn">
																		<button class="btn btn-lg" type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
																	</span> </div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div></li>
							<!-- social-start -->
							@php
 								$socials=DB::table('socials')->first();
							@endphp
							<li>
								<div class="dropdown">
								  <button class="dropbtn-02"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
								  <div class="dropdown-content">
									<a href="../../../../{{$socials->facebook}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
									<a href="../../../../{{$socials->twitter}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
									<a href="../../../../{{$socials->youtube}}" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i> Youtube</a>
									<a href="../../../../{{$socials->instagram}}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a>
								  </div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section><!-- /.header-close -->
	
    <!-- top-add-start -->
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
					<div class="top-add"><img src="{{asset('assets/img/top-ad.jpg')}}" alt="" /></div>
				</div>
			</div>
		</div>
	</section> <!-- /.top-add-close -->
	
	<!-- date-start -->
    <section>
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-md-12 col-sm-12">
					<div class="date">
						<ul>
							<li><i class="fa fa-map-marker" aria-hidden="true"></i>  Darbandikhan </li>
						</ul>
						
					</div>
				</div>
    		</div>
    	</div>
    </section><!-- /.date-close -->  

	<!-- notice-start -->
	 
    <section>
    	<div class="container-fluid">
			<div class="row scroll">
				<div class="col-md-2 col-sm-3 scroll_01 ">
				@if(session()->get('lang')=='hindi')
				Breaking News :
					@else
					Breaking News :
					@endif
					
				</div>
				@php
 					$postmark=DB::table('posts')->where('headline',1)->limit(3)->get();
				@endphp
				<div class="col-md-10 col-sm-9 scroll_02">
					<marquee>
					@foreach($postmark as $row)
					@if(session()->get('lang')=='hindi')
					{{$row->title_hin}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					@else
					{{$row->title_en}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					@endif
				@endforeach
				</marquee>
				</div>
			</div>
    	</div>

				@php
 					$notices=DB::table('notices')->where('status',1)->limit(3)->get();
				@endphp
				@if($notices->count()>0)
		<div class="container-fluid">
			<div class="row scroll">
				<div class="col-md-2 col-sm-3 scroll_01 ">
				@if(session()->get('lang')=='hindi')
					Notices :
					@else
					Notices :
					@endif
					
				</div>
				
				<div class="col-md-10 col-sm-9 scroll_02">
					<marquee>
					@foreach($notices as $row)
					@if(session()->get('lang')=='hindi')
					{{$row->notices}}
					@else
					{!! $row->notices !!}
					@endif
				@endforeach
				</marquee>
				</div>
			</div>
    	</div>
		@endif


    </section>     
