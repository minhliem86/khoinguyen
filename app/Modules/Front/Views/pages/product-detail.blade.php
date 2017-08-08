@extends('Front::layouts.default')

@section('title', 'Inox Khôi Nguyên - Sản phẩm chi tiết')

@section('content')
    @if($product)
    <div class="row product-info">
        <div class="col-md-6">
            <div class="image">
                <a class="cloud-zoom" rel="adjustX: 0, adjustY:0" id='zoom1' href="{{asset('/public/upload')}}/{{$product->avatar_img}}" title="{{$product->title}}">
                    <img src="{{asset('/public/upload')}}/{{$product->avatar_img}}" title="{{$product->title}}" alt="{{$product->title}}" id="image" />
                </a>
            </div>
            @if(!$product->photos->isEmpty())
            <div class="image-additional">
                <a title="{{$product->title}}" rel="useZoom: 'zoom1', smallImage:'{{asset('/public/upload')}}/{{$product->avatar_img}}' " class="cloud-zoom-gallery" href="{{asset('/public/upload')}}/{{$product->avatar_img}}">
                    <img alt="{{$product->title}}" title="{{$product->title}}" src="{{asset('/public/upload')}}/{{$product->avatar_img}}">
                </a>
                @foreach($product->photos()->get() as $photo)
                <a title="{{$product->title}}" rel="useZoom: 'zoom1', smallImage:'{{asset('/public/upload')}}/{{$photo->thumb_url}}' " class="cloud-zoom-gallery" href="{{asset('/public/upload')}}/{{$photo->img_url}}">
                    <img alt="{{$product->title}}" title="{{$product->title}}" src="{{asset('/public/upload')}}/{{$photo->img_url}}">
                </a>
                @endforeach
              </div>
              @endif
        </div>
        <div class="col-md-6">
                <h1>{{$product->title}}</h1>
                <div class="line"></div>
                <ul>
                    <li><span>Tình trạng: </span>Còn hàng</li>
                </ul>
                <div class="price">
                    Giá:  <strong>{{number_format($product->price)}} VND</strong>
                </div>
                <div class="line"></div>
                <div class="tabs">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#home">Mô tả</a></li>
                    </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="home">{!!$product->description!!}</div>
                </div>
                </div>
        </div>
    </div>
    @endif
    <h3 class="related">Các Sản Phẩm Khác</h3>
    <div class="row">
        <div class="col-md-3">
            <div class="product">
                <a href="product.html"><img alt="dress1home" src="{{asset('/public/assets/front')}}/products/dress1home.jpg"></a>
                <div class="name">
                <a href="">Elegant Dress</a>
                </div>
                <div class="price">
                <p>$200.00</p>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script type="text/javascript" src="{{asset('/public/assets/front')}}/js/cloud-zoom.1.0.3.js"></script>
    <script>
    $.fn.CloudZoom.defaults = {
    	zoomWidth:"auto",
    	zoomHeight:"auto",
    	position:"inside",
    	adjustX:0,
    	adjustY:0,
    	adjustY:"",
    	tintOpacity:0.5,
    	lensOpacity:0.5,
    	titleOpacity:0.5,
    	smoothMove:3,
    	showTitle:false};

    $(document).ready(function()
    {
        $('#myTab a').click(function (e) {
    		e.preventDefault();
    		$(this).tab('show');
        })
    });
    </script>
@stop
