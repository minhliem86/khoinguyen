@extends('Admin::layouts.main-layout')

@section('link')
    {{Html::link(url()->previous(), 'Cancel', ['class'=>'btn btn-danger'])}}
    <button class="btn btn-primary" onclick="submitForm();">Save Changes</button>
@stop

@section('title','Edit Category')

@section('content')
    <div class="row">
      <div class="col-sm-12">
        {{Form::model($inst, ['route'=>['admin.product.update',$inst->id], 'method'=>'put' ])}}
          <div class="form-group">
            <label class="col-md-2 control-label">Sản phẩm</label>
            <div class="col-md-10">
              {{Form::text('title',old('title'), ['class'=>'form-control', 'placeholder'=>'Title'])}}
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Mô tả</label>
            <div class="col-md-10">
                <textarea required="" class="form-control my-editor" placeholder="Description" rows="15" id="description" name="description">
                    {!! old('description', $inst->description) !!}
                </textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Giá</label>
            <div class="col-md-10">
              {{Form::text('price',old('price'), ['class'=>'form-control', 'placeholder'=>'Price'])}}
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label" for="description">Sắp xếp</label>
            <div class="col-md-10">
              {{Form::text('order',old('order'), ['class'=>'form-control', 'placeholder'=>'order'])}}
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label" for="description">Trạng thái</label>
            <div class="col-md-10">
                <label class="toggle">
                  <input type="checkbox" name="status" value="1" {{$inst->status == 1 ? 'checked' : '' }}  >
                  <span class="handle"></span>
                </label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Hình ảnh:</label>
            <div class="col-md-10">
                <div class="input-group">
                 <span class="input-group-btn">
                   <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                     <i class="fa fa-picture-o"></i> Chọn
                   </a>
                 </span>
                 {{Form::hidden('avatar_img',old('avatar_img'), ['class'=>'form-control', 'id'=>'thumbnail' ])}}
                </div>
                <img id="holder" style="margin-top:15px;max-height:100px;" src="{{asset('public/upload/'.$inst->avatar_img)}}">
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
