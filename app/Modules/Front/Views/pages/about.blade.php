@extends('Front::layouts.default')

@section('title', 'Inox Khôi Nguyên - Giới thiệu về công ty Khôi Nguyên')

@section('content')
    @include('Front::layouts.banner')
    <div class="row">
        <div class="col-md-12">
                <div class="wrap-about wow fadeInUp">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{asset('public/assets/front/images/about-us.jpg')}}" class="img-responsive" alt="Giới thiệu công ty Inox Khôi Nguyên">
                            </div>
                            <div class="col-md-8">
                                @if($about)
                                {!! $about->content ? $about->content : '' !!}
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
        </div>
    </div>
@stop

@section('script')
    <!-- SWIPER -->
    <link rel="stylesheet" href="{{asset('/public/assets/front')}}/js/plugin/swiper/css/swiper.min.css">
    <script type="text/javascript" src="{{asset('/public/assets/front')}}/js/plugin/swiper/js/swiper.jquery.min.js"></script>
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

          /** Swiper **/
          var productSwiper = new Swiper('.swiper-product',{

          });
     });
    </script>
@stop
