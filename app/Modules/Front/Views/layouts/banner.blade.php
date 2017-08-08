@if(!$banner->isEmpty())
<div class="row">
    <div class="col-md-12 slideshow">
    <div id="slideshow0">
      <div class="camera_wrap camera_emboss camera_white_skin">
        @foreach($banner as $item_banner)
        <div data-thumb="{{asset('/public/upload')}}/{{$item_banner->img_url}}" data-src="{{asset('/public/upload')}}/{{$item_banner->img_url}}" data-link="{{route('front.product')}}">
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endif
