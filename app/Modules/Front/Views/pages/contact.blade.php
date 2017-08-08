@extends('Front::layouts.default')

@section('title','Inox Khôi Nguyên - Liên hệ')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div id="map">
              <p>Enable your JavaScript!</p>
          </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 wow fadeInLeft">
    <div class="contact_form">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(!Session::has('success'))
      <form action="{{route('front.contact.post')}}" method="POST" class="form">
          {{ csrf_field() }}
        <fieldset class="form-group">
          <label>Tên Khách Hàng<span class="required">*</span></label>
          <input type="text" placeholder="Họ tên khách hàng" class="form-control" name="fullname">
          <label>Điện thoại<span class="required">*</span></label>
          <input type="text" placeholder="Điện thoại" class="form-control" name="phone">
          <label>Email<span class="required">*</span></label>
          <input type="text" placeholder="Email" class="form-control" name="email">

        </fieldset>
        <div class="form-group">
          <label>Lời Nhắn</label>
          <textarea rows="3" class="form-control" name="message"></textarea>
        </div>
        <p class="form-group">
          <button class="btn btn-primary" type="submit">Gửi</button>
        </p>
      </form>
      @else
          <p class="text_thank">Cảm ơn bạn đã gửi lời nhắn cho chúng tôi.</p>
          <p class="text_thank">Chúng tôi sẽ kiểm tra yêu cầu và liên lạc lại với bạn trong thời gian sớm nhất.</p>
      @endif
    </div>

  </div>
  <div class="col-md-6 wow fadeInRight">
    <div class="location">
      <address>
        <strong>Inox KHÔI NGUYÊN, Ltd.</strong><br>
        @if($company)
        {{$company->address}}<br>
        <abbr title="Phone">P:</abbr> {{$company->phone}}<br/>
        <abbr title="Email">E:</abbr> {{$company->email}}
        @endif
      </address>

    </div>
  </div>
</div>

@stop
@section('script')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=true"></script>
<script language="javascript" type="text/javascript" src="{{asset('/public/assets/front')}}/js/jquery.ui.map.full.min.js"></script>
<script>
  $(window).load(function()
  {
  	$('#map').gmap().bind('init', function(ev, map)
  	{
  		$('#map').gmap('addMarker', {'position': '-37.8102539,144.9602197', 'bounds': true}).click(function()
  		{
  			$('#map').gmap('openInfoWindow',
  			{
  				'content':
  				'<p>30 South Park Avenue</p><p>San Francisco, CA 94108</p>'
  			}, this);
  		});
  		$('#map').gmap('option', 'zoom', 15);
  	});
  });
</script>


@stop
