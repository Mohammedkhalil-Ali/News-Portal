<!DOCTYPE html>
<html lang="en">
    <head>
    @php
 $seo=DB::table('seos')->first();
 @endphp
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="{{$seo->meta_author}}">
        <meta name="title" content="{{$seo->meta_title}}">
        <meta name="keyword" content="{{$seo->meta_keyword}}">
        <meta name="description" content="{{$seo->meta_description}}">
        <meta name="analytics" content="{{$seo->google_analytics}}">
        <meta name="verification" content="{{$seo->google_verification}}">
        <meta name="alexa_analytics" content="{{$seo->alexa_analytics}}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Easy Online News Site</title>

        <link href="{{asset('Frontend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('Frontend/assets/css/menu.css')}}" rel="stylesheet">
        <link href="{{asset('Frontend/assets/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('Frontend/assets/css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{asset('Frontend/assets/css/responsive.css')}}" rel="stylesheet">
        <link href="{{asset('Frontend/assets/css/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('Frontend/assets/style.css')}}" rel="stylesheet">

    </head>
    <body>
    @include('main.body.header')
    @yield('content')
	@include('main.body.footer')	
		<script src="{{asset('Frontend/assets/js/jquery.min.js')}}"></script>
		<script src="{{asset('Frontend/assets/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('Frontend/assets/js/main.js')}}"></script>
		<script src="{{asset('Frontend/assets/js/owl.carousel.min.js')}}"></script>
	</body>
</html> 