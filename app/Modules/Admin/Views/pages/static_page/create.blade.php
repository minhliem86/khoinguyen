@extends('Admin::layouts.main-layout')

@section('link')
    <button class="btn btn-primary" onclick="submitForm();">Save</button>
@stop

@section('title','Quản lý Trang')

@section('content')
    <div class="row">
      <div class="col-sm-12">
        <form method="POST" action="{{route('admin.page.store')}}" id="form" role="form" class="form-horizontal">
          {{Form::token()}}
          <div class="form-group">
            <label class="col-md-2 control-label">Tên Trang</label>
            <div class="col-md-10">
              <input type="text" required="" placeholder="Page Name" id="page_name" class="form-control" name="page_name">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Tiêu đề Trang</label>
            <div class="col-md-10">
              <input type="text" required="" placeholder="Title" id="title" class="form-control" name="title">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Nội dung</label>
            <div class="col-md-10">
              <textarea name="content" rows="15" class="form-control my-editor" ></textarea>
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
    <script>
        const url = "{{url('/')}}"
        init_tinymce(url);
        // BUTTON ALONE
        init_btnImage(url,'#lfm');
        // SUBMIT FORM
        function submitForm(){
         $('form').submit();
        }
    </script>
@stop
