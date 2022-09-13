@extends('frontend.layouts.main')
@push('title')Home @endpush
@push('home-active')active @endpush
@push('scripts')
<meta name="description" content="Home page of {{ website()->site_name }}">
<link rel="canonical" href="{{ route('home') }}">
<meta property="og:locale" content="en_US">
<meta property="og:type" content="Home">
<meta property="og:title" content="Home - {{ website()->site_name }}">
<meta property="og:description" content="Home page of {{ website()->site_name }}">
<meta property="og:url" content="{{ route('privacy_policy') }}">
<meta property="og:site_name" content="{{ website()->site_name }}">
<meta property="og:image" content="{{ url('/').'/img/trex-01.png' }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Home - {{ website()->site_name }}">
<meta name="twitter:description" content="Home page of {{ website()->site_name }}">
<meta name="twitter:image" content="{{ url('/').'/img/trex-01.png' }}">
<meta name="description" content="Home page of {{ website()->site_name }}">
@endpush
@section('content')
@include('frontend.layouts.navbar')

<div class="main-news">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="px-3">
                        <h3 class="ml-3 mt-2"><strong>Latest Posts</strong></h3>
                        <div class="row">
                            @if (!empty($first_news))
                            <div class="col-lg-6 mb-3">
                                <div class="mn-img">
                                    <img src="{{ $first_news->photo_path }}" alt="{{ $first_news->photo_name }}"
                                        class="rounded border border-dark">
                                </div>
                                <div class="mn-content">
                                    <a class="mn-title" href="{{ url('post/'. $first_news->slug) }}"> {{
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

                            <div class="col-lg-6">
                                @if (!empty($all_news))
                                @foreach ($all_news as $news)
                                <div class="mn-list">
                                    <div class="mn-img">
                                        <img src="{{ $news->photo_path }}" alt="{{ $news->photo_name }}"
                                            class="rounded border border-dark">
                                    </div>
                                    <div class="mn-content">
                                        <a class="mn-title" href="{{ url('post/'. $news->slug) }}"> {{ $news->title }}
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
                            <a href="{{ route('single_tag', ['slug'=>$tag->slug]) }}">{{ $tag->name }}</a>
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

@include('frontend.layouts.footer')
@endsection
