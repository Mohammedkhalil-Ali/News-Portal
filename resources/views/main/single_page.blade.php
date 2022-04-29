@extends('main.home_master')
@section('content')
<section class="single-page">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">   
					   <li><a href="#"><i class="fa fa-home"></i></a></li>					   
						<li><a href="#">
                        @if(session()->get('lang')=='hindi')
                        {{ $post->category_hin }}
                        @else
                        {{ $post->category_en }}
                        @endif
                    </a></li>
						<li><a href="#">
                        @if(session()->get('lang')=='hindi')
                        {{ $post->subcategory_hin }}
                        @else
                        {{ $post->subcategory_en }}
                        @endif
                        </a></li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12"> 											
					<header class="headline-header margin-bottom-10">
						<h1 class="headline">
                        @if(session()->get('lang')=='hindi')
                        {{ $post->title_hin }}
                        @else
                        {{ $post->title_en }}
                        @endif
                        </h1>
					</header>
		 
		 
				 <div class="article-info margin-bottom-20">
				  <div class="row">
						<div class="col-md-6 col-sm-6"> 
						 <ul class="list-inline">
						 
						 
						 <li>Admin </li>     <li><i class="fa fa-clock-o"></i> {{ $post->post_date }} </li>
						 </ul>
						
						</div>
						<div class="col-md-6 col-sm-6 pull-right"> 						
							<ul class="social-nav">
								<li><a href="" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('#'),'facebook-share-dialog','width=626,height=436'); return false;" target="_blank" title="Facebook" rel="nofollow" class="facebook"><i class="fa fa-facebook"></i></a></li>
								<li><a target="_blank" href="" onclick="javascript:window.open('https://twitter.com/share?text=‘#'); return false;" title="Twitter" rel="nofollow" class="twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a target="_blank" href="" onclick="window.open('https://plus.google.com/share?url=#'); return false;" title="Google plus" rel="nofollow" class="google"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#" target="_blank" title="Print" rel="nofollow" class="print"><i class="fa fa-print"></i></a></li>
						
							</ul>						   
						</div>						
					</div>				 
				 </div>				
			</div>
		  </div>
		  <!-- ******** -->
		  <div class="row">
			<div class="col-md-8 col-sm-8">
				<div class="single-news">
					<img src="{{asset($post->image)}}" alt="" />
					<h4 class="caption">
                    @if(session()->get('lang')=='hindi')
                        {!! $post->details_hin !!}
                        @else
                        {!! $post->details_en !!}
                        @endif
                    </p>
				</div>
				<!-- ********* -->
                @php
                    $related_post=DB::table('posts')->where('category_id',$post->category_id)->limit(8)->orderBy('id','desc')->get();
                @endphp
				<div class="row">
					<div class="col-md-12"><h2 class="heading">Related News</h2></div>
                    @foreach($related_post as $row)
					<div class="col-md-4 col-sm-4">
						<div class="top-news sng-border-btm">
							<a href="{{route('single_page',$row->id)}}"><img src="{{asset($row->image)}}" alt="Notebook"></a>
							<h4 class="heading-02"><a href="{{route('single_page',$row->id)}}">
                                @if(session()->get('lang')=='hindi')
                        {{ $row->title_hin }}
                        @else
                        {{ $row->title_en }}
                        @endif</a> 
                            
                        </h4>
						</div>
					</div>
                    @endforeach
			</div>
            </div>

			<div class="col-md-4 col-sm-4">
				<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add"><img src="{{asset('frontend/assets/img/add_01.jpg')}}" alt="" /></div>
						</div>
					</div><!-- /.add-close -->
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
										$latest=DB::table('posts')->limit(10)->orderBy('id','desc')->get();
									@endphp
									@foreach($latest as $row)
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">
										@if(session()->get('lang')=='hindi')
										{{Str::limit($row->title_hin,35)}}
										@else
										{{Str::limit($row->title_en,35)}}
										@endif
											
										</a> </h4>
									</div>
									@endforeach
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tab22">
							<div class="news-titletab">
                            @php
										$popular=DB::table('posts')->inRandomOrder()->limit(10)->orderBy('id','asc')->get();
									@endphp
									@foreach($popular as $row)
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">
										@if(session()->get('lang')=='hindi')
										{{Str::limit($row->title_hin,35)}}
										@else
										{{Str::limit($row->title_en,35)}}
										@endif
										</a> </h4>
									</div>
									@endforeach
							</div>                                          
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tab23">	
							<div class="news-titletab">
                            @php
										$popular1=DB::table('posts')->inRandomOrder()->limit(10)->orderBy('id','desc')->get();
									@endphp
									@foreach($popular1 as $row)
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">
										@if(session()->get('lang')=='hindi')
										{{Str::limit($row->title_hin,35)}}
										@else
										{{Str::limit($row->title_en,35)}}
										@endif
									</a> </h4>
									</div>
									@endforeach
							</div>						                                          
						</div>
					</div>
				</div>
				<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add"><img src="assets/img/add_01.jpg" alt="" /></div>
						</div>
					</div><!-- /.add-close -->
			</div>
		  </div>
		</div>
	</section>
    @endsection