@extends('layouts.main')
@push('title')
Posts - CNPI BLOG
@endpush
@push('posts-active')active @endpush
@section('content')
@include('layouts.navbar')

<div class="single-news">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="sn-img">
                    <img src="img/top-news-1.jpg" />
                </div>
                <div class="sn-content">
                    <a class="sn-title" href="#">{{ $post->title }}</a>
                    <a class="sn-date" href="#"><i class="far fa-clock"></i>{{ $post->updated_at }}</a>
                    <p>{!! $post->content !!}</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="sidebar">
                    <div class="sidebar-widget">
                        <h2><i class="fas fa-align-justify"></i>Category</h2>
                        <div class="category">
                            <ul class="fa-ul">
                                @foreach ($categories as $category)
                                <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a
                                        href="">{{ $category->name }}</a></li>

                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="sidebar-widget">
                        <h2><i class="fas fa-align-justify"></i>Tags</h2>
                        <div class="tags">
                            @foreach ($tags as $tag)
                            <a href="#">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="sidebar-widget">
                        <h2><i class="fas fa-align-justify"></i>Ads 1 column</h2>
                        <div class="image">
                            <a href=""><img src="img/adds-1.jpg" alt="Image"></a>
                        </div>
                    </div>

                    <div class="sidebar-widget">
                        <h2><i class="fas fa-align-justify"></i>Ads 2 column</h2>
                        <div class="image">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href=""><img src="img/adds-2.jpg" alt="Image"></a>
                                </div>
                                <div class="col-sm-6">
                                    <a href=""><img src="img/adds-2.jpg" alt="Image"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Single News End-->


@endsection