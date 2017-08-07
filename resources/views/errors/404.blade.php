@extends('Front::layouts.default')

@section('title', 'Inox Khôi Nguyên - 404 - Page Not Found')

@section('content')
    <div class="row box padding">
        <div class="col-md-6">
            <h1 class="e404"><strong>[404]</strong></h1>
        </div>
        <div class="col-md-6">
            <h1 class="page">Page can not be found.</h1>
            <h6 class="e404">We are sorry, but the page you are looking for might have been removed, had its name changed or is temporarily unavailable.</h6>
            <p>
            <a class="btn btn-primary" href="index.html">
                Get me back to homepage!
            </a>
            </p>
        </div>
    </div>
@stop
