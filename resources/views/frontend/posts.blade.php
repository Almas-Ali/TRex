@extends('frontend.layouts.main')
@push('title')Posts @endpush
@push('home-active')active @endpush
@section('content')
@include('frontend.layouts.navbar')

<div class="single-news">
    <div class="container-fluid">
        <div class="row">
            <h1 class="sn-title my-3">{{ $post->title }}</h1>
            <a class="sn-date text-dark" href="javascript:void(0);"><i class="far fa-clock"></i> {{
                dateHuman($post->updated_at) }} - ({{ $post->updated_at }}) </a>
            <a class="sn-author text-dark mb-3 mt-1" href="javascript:void(0);">
                Post by <strong>{{ Auth::user($post->author)->name }}</strong>
            </a>
            <div class="p-2">
                <img src="{{ $post->path }}" alt="{{ $post->name }}" class="rounded border border-dark" height="500px">
            </div>
            <div class="col-md-8">
                <div class="sn-content">
                    <div>{!! $post->content !!}</div>
                    <div>
                        <strong>Tags:</strong>
                        @if (count($post->tags))
                        @foreach($post->tags as $tag)
                        <label class="badge bg-primary">{{ $tag->name }}</label>
                        @endforeach
                        @else
                        <span class="badge bg-secondary">No tags</span>
                        @endif
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="sidebar mt-3">
                    <div class="sidebar-widget">
                        <h3><strong>Categories</strong></h3>
                        <div class="category">
                            @if (!empty($categories))
                            <ul class="fa-ul">
                                @foreach ($categories as $category)
                                <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a
                                        href="">{{
                                        $category->name }}</a></li>

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

@include('frontend.layouts.footer')

@endsection