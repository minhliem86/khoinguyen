<div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
  <ul class="list-group panel">
    <li class="list-group-item"><b>SIDE PANEL</b></li>
    <li class="list-group-item {{LP_lib::setActive(2,'dashboard')}}"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard </a></li>
    <li class="list-group-item {{LP_lib::setActive(2,'page')}}"><a href="{{route('admin.page.index')}}"><i class="glyphicon glyphicon-tasks"></i>Quản lý Trang </a></li>
    <li class="list-group-item {{LP_lib::setActive(2,'product')}}"><a href="{{route('admin.product.index')}}"><i class="fa fa-sitemap"></i>Quản lý Sản Phẩm</a></li>
    <li class="list-group-item {{LP_lib::setActive(2,'support')}}"><a href="{{route('admin.support.index')}}"><i class="fa  fa-support"></i>Quản lý hỗ trợ viên </a></li>
    <li class="list-group-item {{LP_lib::setActive(2,'media')}}"><a href="{{route('admin.media.index')}}"><i class="fa fa-file-image-o"></i>Quản lý Banner</a></li>
    <li class="list-group-item {{LP_lib::setActive(2,'contact')}}"><a href="{{route('admin.contact.index')}}"><i class="glyphicon glyphicon-envelope"></i>Khách hàng liên hệ</a></li>
    <li class="list-group-item {{LP_lib::setActive(2,'company')}}"><a href="{{route('admin.company.index')}}"><i class="glyphicon glyphicon-certificate"></i>Thông tin công ty </a></li>


  </ul>
</div>
