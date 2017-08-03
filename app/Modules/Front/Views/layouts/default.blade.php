<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/assets/front')}}/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/assets/front')}}/css/bootstrap-select.css">
  	<link href='http://fonts.googleapis.com/css?family=Montserrat:200,300,400,600,700&subset=vietnamese' rel='stylesheet' type='text/css'/>
  	<link href='http://fonts.googleapis.com/css?family=Open+Sans:200,300,400,600,700&subset=vietnamese' rel='stylesheet' type='text/css'/>
  	<link href='{{asset('/public/assets/front')}}/css/font-awesome.min.css' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" type="text/css" href="{{asset('/public/assets/front')}}/css/camera.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/assets/front')}}/css/style.css">
    <!--script type="text/javascript" src="https://getfirebug.com/firebug-lite-debug.js"></script-->
	<title>@yield('title','Inox Khôi Nguyên')</title>
</head>
<body>
  <div class="page-container">
    @include('Front::layouts.header')
    <div class="main-content">
      <div class="container">
        @include('Front::layouts.banner')

        @yield('content')

        @include('Front::layouts.footer')
      </div>
    </div>  <!-- end main-content -->
  </div>
  <script type="text/javascript" src="{{asset('/public/assets/front')}}/js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="{{asset('/public/assets/front')}}/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="{{asset('/public/assets/front')}}/js/bootstrap-select.min.js"></script>
  <script type="text/javascript" src="{{asset('/public/assets/front')}}/js/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="{{asset('/public/assets/front')}}/js/camera.js"></script>
  <script type="text/javascript" src="{{asset('/public/assets/front')}}/js/sapphire.js"></script>
  <script>
  $(document).ready(function() {
    $('#slideshow0 > div').camera({
      alignment: "center",
      autoAdvance: true,
      mobileAutoAdvance: true,
      barDirection: "leftToRight",
      barPosition: "bottom",
      cols: 6,
      easing: "easeInOutExpo",
      mobileEasing: "easeInOutExpo",
      fx: "random",
      mobileFx: "random",
      gridDifference: 250,
      height: "auto",
      hover: true,
      loader: "pie",
      loaderColor: "#eeeeee",
      loaderBgColor: "#222222",
      loaderOpacity: 0.3,
      loaderPadding: 2,
      loaderStroke: 7,
      minHeight: "200px",
      navigation: true,
      navigationHover: true,
      mobileNavHover: true,
      opacityOnGrid: false,
      overlayer: true,
      pagination: true,
      pauseOnClick: true,
      playPause: true,
      pieDiameter: 38,
      piePosition: "rightTop",
      portrait: false,
      rows: 4,
      slicedCols: 12,
      slicedRows: 8,
      slideOn: "random",
      thumbnails: false,
      time: 7000,
      transPeriod: 1500,
      imagePath: '../image/'
    });
  });
  </script>
</body>
</html>
