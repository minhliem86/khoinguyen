@extends('Admin::layouts.main-layout')

@section('link')
    {{Html::link(url()->previous(), 'Cancel', ['class'=>'btn btn-danger'])}}
@stop

@section('title',"Khách hàng liên hệ")

@section('content')
    <div class="row">
      <div class="col-sm-12">
          <div class="form-group">
            <label class="col-md-2 control-label">Tên khách hàng</label>
            <div class="col-md-10">
                <p>{{$inst->fullname}}</p>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Điện thoại khách hàng</label>
            <div class="col-md-10">
              <p>{{$inst->phone}}</p>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Email khách hàng</label>
            <div class="col-md-10">
              <p>{{$inst->email}}</p>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Nội dung</label>
            <div class="col-md-10">
              <p>{{$inst->messages}}</p>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label sr-only"></label>
            <div class="col-md-10">
              <a href="{{route('admin.contact.destroy',$inst->id)}}" class="btn btn-danger">Delete</a>
            </div>
          </div>
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
    // $(document).ready(function(){
    //     $('radio[name="status"]').change(function(){
    //
    //     })
    // })
    </script>
@stop
