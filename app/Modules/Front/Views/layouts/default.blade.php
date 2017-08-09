<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/assets/front')}}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/assets/front')}}/css/bootstrap-select.css">
  	<link href='http://fonts.googleapis.com/css?family=Montserrat:200,300,400,600,700&subset=vietnamese' rel='stylesheet' type='text/css'/>
  	<link href='http://fonts.googleapis.com/css?family=Open+Sans:200,300,400,600,700&subset=vietnamese' rel='stylesheet' type='text/css'/>
  	<link href='{{asset('/public/assets/front')}}/css/font-awesome.min.css' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" type="text/css" href="{{asset('/public/assets/front')}}/css/camera.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/assets/front')}}/css/style.css">
    <!--script type="text/javascript" src="https://getfirebug.com/firebug-lite-debug.js"></script-->
	<title>@yield('title','Inox Khôi Nguyên')</title>

    <!-- GA -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-104289084-1', 'auto');
      ga('send', 'pageview');

    </script>
    <!-- END -->
</head>
<body>
  <div class="page-container">
    @include('Front::layouts.header')
    <div class="main-content">
      <div class="container">
          @yield('content')
      </div>
    </div>  <!-- end main-content -->
    @include('Front::layouts.footer')
  </div>
  <script type="text/javascript" src="{{asset('/public/assets/front')}}/js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="{{asset('/public/assets/front')}}/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="{{asset('/public/assets/front')}}/js/bootstrap-select.min.js"></script>
  <script type="text/javascript" src="{{asset('/public/assets/front')}}/js/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="{{asset('/public/assets/front')}}/js/camera.js"></script>
  <script type="text/javascript" src="{{asset('/public/assets/front')}}/js/sapphire.js"></script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCjggrpusRbIwH3F2lYhJJhgX5WIhsn44&callback=initMap"> </script>
  <!--WOW-->
  <link rel="stylesheet" type="text/css" href="{{asset('/public/assets/front')}}/js/plugin/wow/css/libs/animate.css">
  <script src="{{asset('/public/assets/front')}}/js/plugin/wow/dist/wow.min.js"></script>
  <script>
      $(document).ready(function(){
          new WOW().init();
      })
  </script>

  @yield('script')
</body>
</html>
