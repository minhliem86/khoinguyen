@extends('Admin::layouts.main-layout')

@section('link')
    {{Html::link(url()->previous(), 'Cancel', ['class'=>'btn btn-danger'])}}
@stop

@section('title',"Customer's Information")

@section('content')
    <div class="row">
      <div class="col-sm-12">
          <div class="form-group">
            <label class="col-md-2 control-label">Customer's Name</label>
            <div class="col-md-10">
              {{Form::text('fullname',old('fullname'), ['class'=>'form-control', 'placeholder'=>'Name', 'disabled'])}}
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Customer's Phone</label>
            <div class="col-md-10">
              {{Form::text('phone',old($inst->phone), ['class'=>'form-control', 'placeholder'=>'Phone', 'disabled'])}}
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Customer's Email</label>
            <div class="col-md-10">
              {{Form::text('email',old($inst->email), ['class'=>'form-control', 'placeholder'=>'Email', 'disabled'])}}
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Customer's Messages</label>
            <div class="col-md-10">
              {{Form::textarea('messages',old('messages'), ['class'=>'form-control', 'disabled'])}}
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
