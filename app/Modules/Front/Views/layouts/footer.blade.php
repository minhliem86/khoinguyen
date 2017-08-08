<div class="footer black clearfix">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-4">
        <div class="col col1">
          <h3>Inox Khôi Nguyên</h3>
          @if($company)
          <ul>
            <li>{{$company->address}}</li>
            <li>Điện thoại: {{$company->phone}}</li>
            <li>Email: <a href="mailto:{{$company->email}}">{{$company->email}}</a></li>
          </ul>
          @endif
        </div>
      </div>

      <div class="col-md-3 col-sm-4">
        <div class="col col2">
          <h3>SiteMap</h3>
          <ul>
            <li><a href="{{route('front.home')}}">Trang Chủ</a></li>
            <li><a href="{{route('front.about')}}">Giới Thiệu</a></li>
            <li><a href="{{route('front.product')}}">Sản Phẩm</a></li>
            <li><a href="{{route('front.contact.index')}}">Liên Hệ</a></li>
          </ul>
          <ul class="social-network">
            <li><a href=""><i class="fa fa-facebook"></i></a></li>
            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
            <li><a href=""><i class="fa fa-twitter"></i></a></li>
            <li><a href=""><i class="fa fa-rss"></i></a></li>
          </ul>
        </div>
      </div>

      <div class="col-md-6 col-sm-4">
        <div class="col col3 map">
          <h3>Bản đồ</h3>
          <div id="mapFooter">

          </div>
          <script>
            function initMap() {
              var pos = {lat: {{$company ? json_decode($company->map)[0] : '10.8571501'}}, lng: {{$company ? json_decode($company->map)[1] : '106.6390513'}}};
              @if(request()->segment(1) === 'lien-he')
              var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 17,
                center: pos
              });
              var marker = new google.maps.Marker({
                position: pos,
                map: map,
                title: 'INOX KHÔI NGUYÊN'
              });
              @endif
              var map2 = new google.maps.Map(document.getElementById('mapFooter'), {
                zoom: 17,
                center: pos
              });
              var marker2 = new google.maps.Marker({
                position: pos,
                map: map2,
                title: 'INOX KHÔI NGUYÊN'
              });
            }
          </script>
        </div>
      </div>
    </div>
  </div>
</div>
