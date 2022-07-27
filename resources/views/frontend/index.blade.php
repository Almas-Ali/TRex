@extends('frontend.layouts.main')
@push('title')Home @endpush
@push('home-active')active @endpush
@section('content')

{{-- <h1 align="center">This is index page...</h1> --}}

@include('frontend.layouts.top_nav')
@include('frontend.layouts.navbar')


{{--
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
<!-- Top News End--> --}}


<!-- Main News Start-->
<div class="main-news">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="px-3">
                        <h3 class="ml-3 mt-2"><strong>Latest Posts</strong></h3>
                        <div class="row">
                            <!-- First news -->
                            @if (!empty($first_news))
                            <div class="col-lg-6 mb-3">
                                <div class="mn-img">
                                    <img src="{{ $first_news->path }}" alt="{{ $first_news->name }}"
                                        class="rounded border border-dark">
                                </div>
                                <div class="mn-content">
                                    <a class="mn-title" href="{{ url('posts/'. $first_news->slug) }}"> {{
                                        $first_news->title }} </a>
                                    <a class="mn-date" href="javascript:void(0);"><i class="far fa-clock"></i> {{
                                        dateHuman($first_news->created_at)
                                        }} </a>
                                    <p class="news_post">
                                        {{ Str::limit(strip_tags($first_news->content), 60) }}
                                    </p>
                                </div>
                            </div>
                            @else
                            <div>
                                <h5>No post exist!</h5>
                            </div>
                            @endif


                            <!-- All except first news -->

                            <div class="col-lg-6">
                                @if (!empty($all_news))
                                @foreach ($all_news as $news)
                                <div class="mn-list">
                                    <div class="mn-img">
                                        <img src="{{ $news->path }}" alt="{{ $news->name }}"
                                            class="rounded border border-dark">
                                    </div>
                                    <div class="mn-content">
                                        <a class="mn-title" href="{{ url('posts/'. $news->slug) }}"> {{ $news->title }}
                                        </a>
                                        <a class="mn-date" href="javascript:void(0);"><i class="far fa-clock"></i> {{
                                            dateHuman($news->created_at) }}
                                        </a>
                                        <p class="news_post">
                                            {{ Str::limit(strip_tags($first_news->content), 40) }}
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 my-2">
                <div class="sidebar">
                    <div class="sidebar-widget">
                        <h3><strong>Categories</strong></h3>
                        <div class="category">
                            @if (!empty($categories))
                            <ul class="fa-ul">
                                @foreach ($categories as $category)
                                <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span>
                                    <a href="#">{{ $category->name }}</a>
                                </li>

                                @endforeach
                            </ul>
                            @else
                            <div>
                                <h5>No categories exist!</h5>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="sidebar-widget my-2">
                        <h3><strong>Tags</strong></h3>
                        @if (!empty($tags))
                        <div class="tags">
                            @foreach ($tags as $tag)
                            <a href="javascript:void(0);">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        @else
                        <div>
                            <h5>No tags exist!</h5>
                        </div>
                        @endif
                    </div>

                    <div class="sidebar-widget">
                        <h3><strong>Ads</strong></h3>
                        <div class="image">
                            <a
                                href="http://bteb.gov.bd/sites/default/files/files/admin.portal.gov.bd/npfblock//corona_new.jpg"><img
                                    src="{{ url('/').'/img/corona_new.jpg' }}" alt="Image" height="350"></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main News End-->



@include('frontend.layouts.footer')

@endsection