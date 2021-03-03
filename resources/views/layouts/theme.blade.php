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
	@yield('chatboxstyle')
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

	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<!-- The core Firebase JS SDK is always required and must be listed first -->
	<script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-app.js"></script>

	<!-- TODO: Add SDKs for Firebase products that you want to use
		https://firebase.google.com/docs/web/setup#available-libraries -->
	<script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-analytics.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-messaging.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-database.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-firestore.js"></script>
	<script>
	// Your web app's Firebase configuration
	// For Firebase JS SDK v7.20.0 and later, measurementId is optional
	var firebaseConfig = {
    apiKey: "AIzaSyCcJPaEusZg6XqOXU-StDlqJQrE83gCUrE",
    authDomain: "streamaccess-73022.firebaseapp.com",
    databaseURL: "https://streamaccess-73022-default-rtdb.firebaseio.com",
    projectId: "streamaccess-73022",
    storageBucket: "streamaccess-73022.appspot.com",
    messagingSenderId: "188738858058",
    appId: "1:188738858058:web:9fd23e10236a75fb9d0ab3",
    measurementId: "G-4WC3GMTYHW"
  };
	// Initialize Firebase
	firebase.initializeApp(firebaseConfig);
	firebase.analytics();
	const messaging = firebase.messaging();
	var database = firebase.database();

	messaging.onMessage((payload) => {
		console.log('Message received. ', payload);
		// ...
	});
	</script>
	
	@yield('script')
	@yield('chatboxscript')
	@yield('postscomment')
	@yield('follow')
	@yield('like')
</body>

</html>