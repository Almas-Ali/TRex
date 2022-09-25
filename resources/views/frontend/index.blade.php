@extends('frontend.layouts.main') @push('title')Home @endpush @push('home-active')active @endpush @push('scripts')
<meta name="description" content="Home page of {{ website()->site_name }}" />
<link rel="canonical" href="{{ route('home') }}" />
<script src="{{ asset('js/type.js') }}" defer></script>
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="Home" />
<meta property="og:title" content="Home - {{ website()->site_name }}" />
<meta property="og:description" content="Home page of {{ website()->site_name }}" />
<meta property="og:url" content="{{ route('privacy_policy') }}" />
<meta property="og:site_name" content="{{ website()->site_name }}" />
<meta property="og:image" content="{{ url('/').'/img/trex-01.png' }}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="Home - {{ website()->site_name }}" />
<meta name="twitter:description" content="Home page of {{ website()->site_name }}" />
<meta name="twitter:image" content="{{ url('/').'/img/trex-01.png' }}" />
<meta name="description" content="Home page of {{ website()->site_name }}" /> @endpush @section('content')
@include('frontend.layouts.navbar')

<div class="main-news">
  <div class="home-page">
    <div class="typewrite-main py-5">
      <h1 class="text-light s-title">Welcome to {{website()->site_name}}</h1>
      A
      <span class="typewrite" data-type='["CMS", "Blog", "Guide", "Manual"]' data-period="1000">
      </span>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="row">
          <div class="px-3">
            <h3 class="ml-3 mt-2"><strong>Latest Posts</strong></h3>
            <div class="row">
              @if (!empty($posts)) @foreach ($posts as $post)
              <!-- <div class="col-lg-6 mb-3">
                <div class="mn-img">
                  <img src="{{ $post->photo_path }}" alt="{{ $post->photo_name }}"
                    class="rounded border border-dark" />
                </div>
                <div class="mn-content">
                  <a class="mn-title" href="{{ url('post/'. $post->slug) }}">
                    {{ $post->title }}
                  </a>
                  <a class="mn-date" href="javascript:void(0);"><i class="far fa-clock"></i>
                    {{ dateHuman($post->created_at) }}
                  </a>
                  <p class="news_post">
                    {{ Str::limit(strip_tags($post->content), 60) }}
                  </p>
                </div>
              </div> -->
              <div class="col-12 row p-2 my-2 rounded post-view">
                <div class="col-3">
                  <img src="{{ $post->photo_path }}" alt="{{ $post->photo_name }}" class="rounded my-2 post-img" />
                </div>
                <div class="col-9 d-flex flex-column justify-content-between">
                  <div>
                    <h4>
                      <a class="text-dark" href="{{ url('post/'. $post->slug) }}">
                        {{ $post->title }}
                      </a>
                    </h4>
                    <p class="news_post">
                      {{ Str::limit(strip_tags($post->content), 120) }}
                    </p>
                  </div>
                  <div class="d-flex flex-row justify-content-between post-elements">
                    <div>
                      @foreach ($post->tags as $tag)
                      <span class="badge rounded-pill text-bg-info">{{ $tag->name }}</span>
                      @endforeach
                    </div>

                    <div class="user d-flex flex-row text-muted">
                      <img src="{{ getUser($post->user)->photo_path }}" alt="User Image" class="rounded-circle"
                        style="object-fit: fill;" height="25px" />
                      <p>{{ getUser($post->user)->name }}</p>
                    </div>

                    <a class="text-muted" href="javascript:void(0);"><i class="far fa-calendar"></i>
                      {{ dateHuman($post->created_at) }}
                    </a>

                    <a class="text-muted" href="javascript:void(0);"><i class="far fa-comment"></i>
                      {{ getCommentCount($post->id) }}
                    </a>

                    <a class="text-muted" href="javascript:void(0);"><i class="far fa-thumbs-up"></i>
                      {{ $post->likers->count() }}
                    </a>

                    <a class="text-muted" href="javascript:void(0);"><i class="far fa-eye"></i>
                      {{ postViewCount($post->id) }}
                    </a>
                  </div>
                </div>
              </div>
              @endforeach
              @else
              <div>
                <h5>No post exist!</h5>
              </div>
              @endif

              <!-- <div class="col-lg-6">
                @if (!empty($all_news)) @foreach ($all_news as $news)
                <div class="mn-list">
                  <div class="mn-img">
                    <img src="{{ $news->photo_path }}" alt="{{ $news->photo_name }}"
                      class="rounded border border-dark" />
                  </div>
                  <div class="mn-content">
                    <a class="mn-title" href="{{ url('post/'. $news->slug) }}">
                      {{ $news->title }}
                    </a>
                    <a class="mn-date" href="javascript:void(0);"><i class="far fa-clock"></i>
                      {{
                                            dateHuman($news->created_at) }}
                    </a>
                    <p class="news_post">
                      {{ Str::limit(strip_tags($first_news->content), 40) }}
                    </p>
                  </div>
                </div>
                @endforeach @else @endif
              </div> -->
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 my-2">
        <div class="sidebar">
          <div class="sidebar-widget card p-3 rounded" style="box-shadow: 0 0 5px #0003">
            <h4><strong>Categories</strong></h4>
            <div class="category">
              @if (!empty($categories))
              <ul class="fa-ul">
                @foreach ($categories as $category)
                <li class="row" style="margin: 0 0 0 10px">
                  <div class="col">
                    <span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span>
                    <a href="#">{{ $category->name }}</a>
                  </div>
                  <div class="col">
                    <span class="">{{ postCountCategory($category->id) }}</span>
                  </div>
                </li>
                @endforeach
              </ul>
              <a href="{{ route('list_category') }}" class="btn btn-sm btn-theme text-light mt-3">See
                More</a> @else
              <div>
                <h5>No categories exist!</h5>
              </div>
              @endif
            </div>
          </div>

          <div class="sidebar-widget my-2 card rounded p-3" style="box-shadow: 0 0 5px #0003">
            <h4><strong>Tags</strong></h4>
            @if (!empty($tags))
            <div class="tags">
              @foreach ($tags as $tag)
              <a href="{{ route('single_tag', ['slug'=>$tag->slug]) }}">{{ $tag->name }}</a> @endforeach
            </div>
            @else
            <div>
              <h5>No tags exist!</h5>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('frontend.layouts.footer') @endsection