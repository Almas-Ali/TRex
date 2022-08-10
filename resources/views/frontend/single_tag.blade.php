@extends('frontend.layouts.main')
@push('title'){{ $tag->name }} @ Tag @endpush
@push('categories-active')active @endpush
@push('scripts')
<meta name="description" content="This is {{ $tag->name }} tag page - {{ website()->site_name }}">
<link rel="canonical" href="{{ route('single_tag', ['slug'=>$tag->slug]) }}">
<meta property="og:locale" content="en_US">
<meta property="og:type" content="tag">
<meta property="og:title" content="{{ $tag->name }} - {{ website()->site_name }}">
<meta property="og:description" content="This is {{ $tag->name }} tag page - {{ website()->site_name }}">
<meta property="og:url" content="{{ route('privacy_policy') }}">
<meta property="og:site_name" content="{{ website()->site_name }}">
<meta property="og:image" content="{{ url('/').'/img/trex-01.png' }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="tag - {{ website()->site_name }}">
<meta name="twitter:description" content="This is {{ $tag->name }} tag page - {{ website()->site_name }}">
<meta name="twitter:image" content="{{ url('/').'/img/trex-01.png' }}">
<meta name="description" content="This is {{ $tag->name }} tag page - {{ website()->site_name }}">
@endpush
@section('content')
@include('frontend.layouts.navbar')


<div class="container">
  <h1 class="my-2">Post from : {{ $tag->name }} Tag</h1>
  <div class="d-flex flex-row my-3">
    @php $i = 0; @endphp
    @foreach ($posts as $post)
    @php $i += 1; @endphp
    <div class="col-md-4 mx-2">
      <div class="card">
        <div class="card-img">
          <img src="{{ $post->photo_path }}" alt="{{ $post->photo_name }}" class="w-100" height="300px">
        </div>
        <div class="card-title">
          <h4 class="mt-2 mx-3">
            <a class="text-dark" href="{{ route('posts', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
          </h4>
        </div>
        <div class="card-body">
          <p>{{ Str::limit(strip_tags($post->content), 120) }}</p>
        </div>
        <div class="card-footer d-flex justify-content-between">
          <p>{{ dateHuman($post->created_at) }}</p>
          <a type="button" class="btn btn-primary text-light" href="{{ route('posts', ['slug' => $post->slug]) }}">View
            Post</a>
        </div>
      </div>
    </div>

    @if (fmod($i, 3) == 0)

  </div>
  <div class="d-flex row my-3">
    @else
    @endif

    @endforeach
  </div>
</div>


@include('frontend.layouts.footer')

@endsection