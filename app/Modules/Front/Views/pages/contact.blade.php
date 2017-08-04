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
  <div class="col-md-6">
    <div class="contact_form">
      <form action="" method="POST" class="form">
          {{ csrf_field() }}
        <fieldset class="form-group">
          <label>Tên Khách Hàng<span class="required">*</span></label>
          <input type="text" placeholder="fullname" class="form-control">
          <label>Điện thoại<span class="required">*</span></label>
          <input type="text" placeholder="phone" class="form-control">
          <label>Email<span class="required">*</span></label>
          <input type="text" placeholder="Email" class="form-control">

        </fieldset>
      </form>
      <div class="form-group">
        <label>Lời Nhắn<span class="required">*</span></label>
        <textarea rows="3" class="form-control"></textarea>
      </div>
      <p class="form-group">
        <button class="btn btn-primary" type="submit">Gửi</button>
      </p>
    </div>
  </div>
  <div class="col-md-6">
    <div class="location">
      <address>
        <strong>Twitter, Inc.</strong><br>
        795 Folsom Ave, Suite 600<br>
        San Francisco, CA 94107<br>
        <abbr title="Phone">P:</abbr> (123) 456-7890
      </address>

      <address>
        <strong>Full Name</strong><br>
        <a href="mailto:#">first.last@example.com</a>
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
