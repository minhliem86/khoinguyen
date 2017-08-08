@extends('Front::layouts.default')

@section('content')
    @include('Front::layouts.banner')
    <div class="row">
	   <div class="col-md-3 left-menu">
              <div class="wrap-left-menu">
                  <div class="box">
                    <h3 class="title-box">Sản Phẩm nổi bật</h3>
                    <div class="content-box">
                        <div class="swiper-container swiper-product">
                          <div class="swiper-wrapper">
                            <div class="swiper-slide">
                              <img src="{{asset('/public/assets/front')}}/image/banner.png" class="img-responsive" alt="">
                            </div>
                            <div class="swiper-slide">
                              <img src="{{asset('/public/assets/front')}}/image/banner.png" class="img-responsive" alt="">
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
              </div>    <!-- end wrap-left-menu-->
              <div class="wrap-left-menu">
                  <div class="box">
                    <h3 class="title-box">Hỗ Trợ Khách Hàng</h3>
                    <div class="content-box">

                    </div>
                  </div>
              </div>    <!-- end wrap-left-menu-->
		</div>    <!-- end left-menu-->

  		<div class="col-md-9">
        @if(!$product->isEmpty())
        @foreach($product->chunk(3) as $chunk)
  			<div class="row">
            @foreach($chunk as $item_product)
  			    <div class="col-md-4">
  				    <div class="product">
  					    <a href="{{route('front.product.detail', $item_product->slug)}}"><img alt="{{$item_product->title}}" src="{{asset('public/upload')}}/{{$item_product->avatar_img}}"></a>
  						  <div class="name">
  					      <a href="{{route('front.product.detail', $item_product->slug)}}">{{$item_product->title}}</a>
  					    </div>
  					    <div class="price">
  					      <p>{{$item_product->price}}</p>
  					    </div>
  					  </div>
  				  </div>
            @endforeach
  			</div>
        @endforeach
        @endif
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
