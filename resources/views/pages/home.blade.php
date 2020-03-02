@extends('layouts.index')

@push('css')
    <link rel="stylesheet" href="source/css/style.css">
    <link rel="stylesheet" href="source/css/course.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>

@endpush

@section('title', 'Home')

@section('content')
    @include('flashmessage')
    @include('layouts.header')
    @include('layouts.slide')
    @include('course.list')
@endsection()

@push('scripts')
    <script src="source/js/flashmessage.js"></script>
@endpush
