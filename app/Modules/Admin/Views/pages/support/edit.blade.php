@extends('Admin::layouts.main-layout')

@section('link')
    {{Html::link(url()->previous(), 'Cancel', ['class'=>'btn btn-danger'])}}
    <button class="btn btn-primary" onclick="submitForm();">Save Changes</button>
@stop

@section('title','Edit Page')

@section('content')
    <div class="row">
      <div class="col-sm-12">
        {{Form::model($inst, ['route'=>['admin.support.update',$inst->id], 'method'=>'put' ])}}
          <div class="form-group">
            <label class="col-md-2 control-label">Skype's nickname</label>
            <div class="col-md-10">
              {{Form::text('support_id',old('support_id'), ['class'=>'form-control', 'placeholder'=>'Skype'])}}
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Tên</label>
            <div class="col-md-10">
              {{Form::text('name',old('name'), ['class'=>'form-control', 'placeholder'=>'Tên hỗ trợ viên'])}}
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Thứ tự</label>
            <div class="col-md-10">
              {{Form::text('order',old('order'), ['class'=>'form-control', 'placeholder'=>'Thứ tự'])}}
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label" for="description">Status</label>
            <div class="col-md-10">
                <label class="toggle">
                  <input type="checkbox" name="status" value="1" {{$inst->status == 1 ? 'checked' : '' }}  >
                  <span class="handle"></span>
                </label>
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
    // $(document).ready(function(){
    //     $('radio[name="status"]').change(function(){
    //
    //     })
    // })
    </script>
@stop
