@extends('Front::layouts.default')

@section('title', 'Inox Khôi Nguyên - 404 - Page Not Found')

@section('content')
    <div class="row box padding">
        <div class="col-md-6">
            <h1 class="e404"><strong>[404]</strong></h1>
        </div>
        <div class="col-md-6">
            <h1 class="page">Không thể tìm thấy trang.</h1>
            <h6 class="e404">Dù đã cố gắng nhưng chúng tôi không thể tìm thấy trang bạn yêu cầu.</h6>
            <h6 class="e404">Trân thành xin lỗi !</h6>
            <p>
            <a class="btn btn-primary" href="{{route('front.home')}}">
                Trang chủ
            </a>
            </p>
        </div>
    </div>
@stop
