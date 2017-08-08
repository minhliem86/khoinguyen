@extends('Front::layouts.default')

@section('title', 'Inox Khôi Nguyên - Sản phẩm của chúng tôi')

@section('content')
    <div class="row">
        <div class="col-md-3 left-menu wow fadeInDown">
               <div class="wrap-left-menu">
                   <div class="box">
                     <h3 class="title-box">Sản Phẩm nổi bật</h3>
                     <div class="content-box">
                         @if(!$hot_product->isEmpty())
                         <div class="swiper-container swiper-product">
                           <div class="swiper-wrapper">
                              @foreach($hot_product as $item_hot)
                             <div class="swiper-slide">
                               <img src="{{asset('public/upload')}}/{{$item_hot->avatar_img}}" class="img-responsive" alt="{{$item_hot->title}}">
                             </div>
                             @endforeach
                           </div>
                         </div>
                         @endif
                     </div>
                   </div>
               </div>    <!-- end wrap-left-menu-->
               @if(!$support->isEmpty())
               <div class="wrap-left-menu">
                   <div class="box">
                     <h3 class="title-box">Hỗ Trợ Khách Hàng</h3>
                     <div class="content-box">
                         @foreach($support as $item_support)
                         <div class="skype-button rounded" data-contact-id="{{$item_support->support_id}}">{{$item_support->name}}</div>
                         @endforeach
                     </div>
                   </div>
               </div>    <!-- end wrap-left-menu-->
               @endif
 		</div>    <!-- end left-menu-->

        <div class="col-md-9">
            @include('Front::layouts.banner')
            @if(!$product->isEmpty())
            @foreach($product->chunk(3) as $chunk)
            <div class="row">
                @foreach($chunk as $item_product)
                <div class="col-md-4">
                    <div class="product each-product">
                        <a href="{{route('front.product.detail', $item_product->slug)}}"><img alt="{{$item_product->title}}" src="{{asset('/public/upload')}}/{{$item_product->avatar_img}}"></a>
                        <div class="name">
                        <a href="{{route('front.product.detail',$item_product->slug)}}">{{$item_product->title}}</a>
                        </div>
                        <div class="price">
                            <p>{{number_format($item_product->price)}} VND</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @include('Front::paginations.customize',['paginator'=>$product])
            
        </div>
    </div>
@stop


@section('script')
    <!--SKYPE-->
    <script src="https://swc.cdn.skype.com/sdk/v1/sdk.min.js"></script>
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
              autoplay: 3500,
              speed: 1500
          });
     });
    </script>
@stop
