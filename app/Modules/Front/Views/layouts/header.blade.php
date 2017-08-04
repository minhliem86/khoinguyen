<div class="header">
  <nav class="navbar container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="index.html" class="navbar-brand"><img src="{{asset('/public/assets/front')}}/img/logo.png" alt="Inox Khôi Nguyên">Inox Khôi Nguyên</a>
    </div>

    <div class="navbar-collapse collapse navbar-right">
      <ul class="nav navbar-nav">
        <li class="{{LP_lib::setActive(1,'')}}" ><a href="index.html">Trang chủ</a></li>
        <li><a href="blog.html">Giới thiệu</a></li>
        <li><a href="contact.html">Sản phẩm</a></li>
        <li class="{{LP_lib::setActive(1,'lien-he')}}"><a href="contact.html">Liên hệ</a></li>
      </ul>
      <form action="/" class="navbar-form navbar-search navbar-right" role="search">
        <div class="input-group">
          <input type="text" name="search" placeholder="Search" class="search-query col-md-2"><button type="submit" class="btn btn-default icon-search"></button>
        </div>
      </form>
    </div><!-- /.navbar-collapse -->
  </nav>
</div>  <!-- end header -->
