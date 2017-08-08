@extends('Admin::layouts.main-layout')

@section('link')
    <button class="btn btn-primary" onclick="submitForm();">Save</button>
@stop

@section('title','Thêm Hỗ trợ viên')

@section('content')
    <div class="row">
      <div class="col-sm-12">
        <form method="POST" action="{{route('admin.support.store')}}" id="form" role="form" class="form-horizontal">
          {{Form::token()}}
          <div class="form-group">
            <label class="col-md-2 control-label">Skype's Nickname</label>
            <div class="col-md-10">
              <input type="text" required="" placeholder="Skype id" id="support_id" class="form-control" name="support_id">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Tên</label>
            <div class="col-md-10">
              <input type="text" required="" placeholder="Tên hỗ trợ viên" id="name" class="form-control" name="name">
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
