<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Stream Access</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/line-awesome.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/line-awesome-font-awesome.min.css')}}">
	<link href="{{asset('css/all.min.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/slick-theme.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-datepicker.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/jquery.range.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/select2.min.css')}}">
	@yield('style')
</head>

<body oncontextmenu="return false;">

	<div class="wrapper">
		@include('layouts.include.navbar')
		@yield('main-content')
	</div>
	<!--theme-layout end-->

	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/popper.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.mCustomScrollbar.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/scrollbar.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/script.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.range-min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap-datepicker.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/select2.min.js')}}"></script>
	
	@yield('script')
</body>

</html>