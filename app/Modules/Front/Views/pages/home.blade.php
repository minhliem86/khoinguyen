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
              <div class="box">
                <h3 class="title-box">Hỗ Trợ Khách Hàng</h3>
                <div class="content-box">

                </div>
              </div>
          </div>    <!-- end wrap-left-menu-->
			</div>    <!-- end left-menu-->

  		<div class="col-md-9">

  			<div class="row">
  			    <div class="col-md-4">
  				    <div class="product">
  					    <a href="product.html"><img alt="dress1home" src="products/dress1home.jpg"></a>
  						<div class="name">
  					    <a href="product.html">Elegant Dress</a>
  					    </div>
  					    <div class="price">
  					    <p>$200.00</p>
  					    </div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
@stop
