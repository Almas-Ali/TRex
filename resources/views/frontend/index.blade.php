@extends('layouts.main')
@push('title')Home - CNPI BLOG @endpush
@push('home-active')active @endpush
@section('content')

{{-- <h1 align="center">This is index page...</h1> --}}

@include('layouts.top_nav')
@include('layouts.navbar')


<!-- Top News Start-->
<div class="top-news">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="row">
                    @foreach ($posts as $post)
                    <div class="col-md-4 my-2">
                        <div class="tn-img">
                            <img src="img/cat-news-6.jpg" />
                            <div class="tn-content">
                                <div class="tn-content-inner">
                                    <a class="tn-date" href=""><i class="far fa-clock"></i> {{ $post->created_at }} </a>
                                    <a class="tn-title" href="{{ url('posts/'. $post->slug) }}">{{ $post->title }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top News End-->


<!-- Main News Start-->
<div class="main-news">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <h2><i class="fas fa-align-justify"></i>Latest News</h2>
                        <div class="row">
                            <!-- First news -->
                            <div class="col-lg-6">
                                <div class="mn-img">
                                    <img src="img/cat-news-6.jpg" />
                                </div>
                                <div class="mn-content">
                                    <a class="mn-title" href=""> {{ $first_news->title }} </a>
                                    <a class="mn-date" href=""><i class="far fa-clock"></i> {{ $first_news->created_at
                                        }} </a>
                                    <p class="news_post">
                                        {{  Str::limit(strip_tags($first_news->content), 120) }}
                                    </p>
                                </div>
                            </div>

                            <!-- All except first news -->

                            <div class="col-lg-6">
                                @foreach ($all_news as $news)
                                <div class="mn-list">
                                    <div class="mn-img">
                                        <img src="img/cat-news-6.jpg" />
                                    </div>
                                    <div class="mn-content">
                                        <a class="mn-title" href="{{ url('posts/'. $post->slug) }}"> {{ $news->title }} </a>
                                        <a class="mn-date" href=""><i class="far fa-clock"></i> {{ $news->created_at }}
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 my-2">
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

                    <div class="sidebar-widget my-2">
                        <h2><i class="fas fa-align-justify"></i>Tags</h2>
                        <div class="tags">
                            @foreach ($tags as $tag)
                            <a href="#">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="sidebar-widget">
                        <h2><i class="fas fa-align-justify"></i>Ads</h2>
                        <div class="image">
                            <a
                                href="http://bteb.gov.bd/sites/default/files/files/admin.portal.gov.bd/npfblock//corona_new.jpg"><img
                                    src="img/corona_new.jpg" alt="Image" height="350"></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main News End-->



@include('layouts.footer')

@endsection