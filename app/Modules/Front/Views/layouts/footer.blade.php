<div class="footer black clearfix">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
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

      <div class="col-md-4">
        <div class="col col2">
          <h3>&nbsp;</h3>
          <ul>
            <li><a href="{{route('front.home')}}">Trang Chủ</a></li>
            <li><a href="{{route('front.about')}}">Giới Thiệu</a></li>
            <li><a href="{{route('front.product')}}">Sản Phẩm</a></li>
            <li><a href="{{route('front.contact')}}">Liên Hệ</a></li>
          </ul>
          <ul class="social-network">
            <li><a href=""><i class="fa fa-facebook"></i></a></li>
            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
            <li><a href=""><i class="fa fa-twitter"></i></a></li>
            <li><a href=""><i class="fa fa-rss"></i></a></li>
          </ul>
        </div>
      </div>

      <div class="col-md-4">
        <div class="col col3 map">

        </div>
      </div>
    </div>
  </div>
</div>
