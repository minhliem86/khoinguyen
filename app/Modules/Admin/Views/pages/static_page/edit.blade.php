@extends('Admin::layouts.main-layout')

@section('link')
    {{Html::link(url()->previous(), 'Cancel', ['class'=>'btn btn-danger'])}}
    <button class="btn btn-primary" onclick="submitForm();">Save Changes</button>
@stop

@section('title','Edit Page')

@section('content')
    <div class="row">
      <div class="col-sm-12">
        {{Form::model($inst, ['route'=>['admin.page.update',$inst->id], 'method'=>'put' ])}}
          <div class="form-group">
            <label class="col-md-2 control-label">Page Name</label>
            <div class="col-md-10">
              {{Form::text('page_name',old('page_name'), ['class'=>'form-control', 'placeholder'=>'Page Name'])}}
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Title</label>
            <div class="col-md-10">
              {{Form::text('title',old('title'), ['class'=>'form-control', 'placeholder'=>'Title'])}}
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Content</label>
            <div class="col-md-10">
              <textarea name="content" rows="15" class="form-control my-editor" >{{$inst->content}}</textarea>
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
