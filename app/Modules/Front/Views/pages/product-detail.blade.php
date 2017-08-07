@extends('Front::layouts.default')

@section('title', 'Inox Khôi Nguyên - Sản phẩm chi tiết')

@section('content')
    <div class="row product-info">
        <div class="col-md-6">
            <div class="image"><a class="cloud-zoom" rel="adjustX: 0, adjustY:0" id='zoom1' href="{{asset('/public/assets/front')}}/products/dress1home.jpg" title="Nano"><img src="{{asset('/public/assets/front')}}/products/dress1home.jpg" title="Nano" alt="Nano" id="image" /></a></div>
            <div class="image-additional">
                <a title="Dress" rel="useZoom: 'zoom1', smallImage:'{{asset('/public/assets/front')}}/products/dress1home.jpg'" class="cloud-zoom-gallery" href="{{asset('/public/assets/front')}}/products/dress1home.jpg">
                    <img alt="Dress" title="Dress" src="{{asset('/public/assets/front')}}/products/dress1home.jpg">
                </a>
                <a title="Dress" rel="useZoom: 'zoom1', smallImage:'{{asset('/public/assets/front')}}/products/dress5home.jpg'" class="cloud-zoom-gallery" href="{{asset('/public/assets/front')}}/products/dress5home.jpg">
                    <img alt="Dress" title="Dress" src="{{asset('/public/assets/front')}}/products/dress5home.jpg">
                </a>
              </div>
        </div>
        <div class="col-md-6">
            <h1>White bed</h1>
                <div class="line"></div>
                <ul>
                    <li><span>Brand:</span> <a href="#">Shop Online</a></li>
                    <li><span>Product Code:</span> Product 001</li>
                    <li><span>Availability: </span>In Stock</li>
                </ul>
                <div class="price">
                    Price <span class="strike">$150.00</span> <strong>$125.00</strong>
                </div>
                <div class="line"></div>
                <div class="tabs">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#home">Description</a></li>
                    </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="home">When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then </div>
                </div>
                </div>
        </div>
    </div>
    <h3 class="related">Related products</h3>
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
