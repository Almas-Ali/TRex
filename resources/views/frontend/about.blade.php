@extends('frontend.layouts.main')
@push('title')About @endpush
@push('about-active')active @endpush

@section('content')
@include('frontend.layouts.navbar')
@include('frontend.layouts.top_nav')

<h1 align="center">This is about...</h1>

@endsection