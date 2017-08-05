@extends('Admin::layouts.main-layout')

@section('link')
    <button class="btn btn-primary" onclick="submitForm();">Save</button>
@stop

@section('title','Create Product')

@section('content')
    <div class="row">
      <div class="col-sm-12">
        <form method="POST" action="{{route('admin.product.store')}}" id="form" role="form" class="form-horizontal" enctype="multipart/form-data">
          {{Form::token()}}
          <div class="form-group">
            <label class="col-md-2 control-label">Sản phẩm</label>
            <div class="col-md-10">
              {{Form::text('title',old('title'), ['class'=>'form-control', 'placeholder'=>'Title'])}}
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Mô tả</label>
            <div class="col-md-10">
                {{Form::textarea('description',old('description'), ['class'=>'form-control my-editor', 'placeholder' => 'Description'])}}
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Giá</label>
            <div class="col-md-10">
              {{Form::text('price',old('price'), ['class'=>'form-control', 'placeholder'=>'Price'])}}
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Hình đại diện</label>
            <div class="col-md-10">
                <div class="input-group">
                 <span class="input-group-btn">
                   <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                     <i class="fa fa-picture-o"></i> Chọn
                   </a>
                 </span>
                 <input id="thumbnail" class="form-control" type="hidden" name="img_url">
                </div>
                <img id="holder" style="margin-top:15px;max-height:100px;">
            </div>
          </div>
          <div class="form-group">
              <label for="" class="col-md-2">Hình chi tiết </label>
              <div class="col-md-10">
                <input type="file" name="thumb-input[]" id="thumb-input" multiple >
              </div>

          </div>
        </form>
      </div>
    </div>
@endsection

@section('script')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{asset('public')}}/vendor/laravel-filemanager/js/lfm.js"></script>
    <script src="{{asset('public/assets/admin/dist/js/script.js')}}"></script>

    <!--BT Upload-->
    <link rel="stylesheet" href="{{asset('/public/assets/admin')}}/dist/js/plugins/bootstrap-input/css/fileinput.min.css">
    <script src="{{asset('/public/assets/admin')}}/dist/js/plugins/bootstrap-input/js/plugins/sortable.min.js"></script>
    <script src="{{asset('/public/assets/admin')}}/dist/js/plugins/bootstrap-input/js/plugins/purify.min.js"></script>
    <script src="{{asset('/public/assets/admin')}}/dist/js/plugins/bootstrap-input/js/fileinput.min.js"></script>
    <script>
        const url = "{{url('/')}}"
        init_tinymce(url);
        // BUTTON ALONE
        init_btnImage(url,'#lfm');
        // SUBMIT FORM
        function submitForm(){
         $('form').submit();
        }

        $(document).ready(function(){
            $("#thumb-input").fileinput({
                uploadUrl: "", // server upload action
                uploadAsync: true,
                showUpload: false,
                showCaption: false,

                fileActionSettings:{
                  showUpload : false,
                }
            })
        })
    </script>
@stop
