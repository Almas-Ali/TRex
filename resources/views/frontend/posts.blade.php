@extends('frontend.layouts.main')
@push('title')Posts @endpush
@push('home-active')active @endpush
@section('content')
@include('frontend.layouts.navbar')

<div class="">
    <div class="container">
        <div class="row">
            <h1 class="sn-title my-3">{{ $post->title }}</h1>

            <div class="p-2">
                <img src="{{ $post->photo_path }}" alt="{{ $post->photo_name }}" class="rounded" height="500px">
            </div>
            <a class="sn-date text-dark" href="javascript:void(0);"><i class="far fa-clock"></i> {{
                dateHuman($post->updated_at) }} - ({{ $post->updated_at }}) </a>
            <a class="sn-author text-dark mb-3 mt-1" href="javascript:void(0);">
                Post by <strong>{{ getUser($post->user)->name }}</strong>
            </a>
            {{-- <div class="col-md-8"> --}}
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

                <div class="likes my-3">
                    <a href="#" class="btn btn-primary rounded">
                        5
                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="btn btn-danger rounded">
                        1
                        <i class="fa fa-thumbs-down" aria-hidden="true"></i>
                    </a>
                </div>

                <div class="comments">
                    <form action="#" method="post" class="card shadow-lg p-3 mb-5 rounded">
                        <h5>Add a comment</h5>
                        <div class="form-group">
                            <textarea name="cmt" id="cmt" rows="5" class="form-control h-100"></textarea>
                        </div>
                    </form>
                    <h4>7 Comments</h4>
                    <div class="card shadow-lg p-3 mb-5 rounded">
                        <div class="d-flex flex-direction-row" id="comments">
                            <div class="mx-2">
                                <img src="{{ url('/').'/img/badge.png' }}" alt="User Photo" class="rounded-circle"
                                    height="50px" width="50px">
                            </div>
                            <div class="">
                                <h5>User X</h5>
                                <span class="text-muted">5 seconds ago</span>
                                <p>This is a comment.</p>
                                
                                <div class="likes my-3">
                                    <a href="#" class="btn btn-primary rounded">
                                        5
                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger rounded">
                                        1
                                        <i class="fa fa-thumbs-down" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="btn btn-primary rounded">
                                        <i class="fa fa-reply" aria-hidden="true"></i> Reply
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex flex-direction-row mx-5 mt-2" id="replies">
                            <div class="mx-2">
                                <img src="{{ url('/').'/img/badge.png' }}" alt="User Photo" class="rounded-circle"
                                    height="50px" width="50px">
                            </div>
                            <div class="">
                                <h5>User Y</h5>
                                <span class="text-muted">2 seconds ago</span>
                                <p><strong>@User X</strong> This is a reply.</p>
                                
                                <div class="likes my-3">
                                    <a href="#" class="btn btn-primary rounded">
                                        5
                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger rounded">
                                        1
                                        <i class="fa fa-thumbs-down" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="btn btn-primary rounded">
                                        <i class="fa fa-reply" aria-hidden="true"></i> Reply
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <p>
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                      Link with href
                    </a>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                      Button with data-bs-target
                    </button>
                  </p>
                  <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                      Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                    </div>
                  </div>
                {{--
            </div> --}}

            {{-- <div class="col-md-4">
                <div class="sidebar mt-3">
                    <div class="sidebar-widget">
                        <h3><strong>Categories</strong></h3>
                        <div class="category">
                            @if (!empty($categories))
                            <ul class="fa-ul">
                                @foreach ($categories as $category)
                                <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span>
                                    <a href="javascript:void(0);">{{
                                        $category->name }}</a>
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
                            <a href="{{ url('/').'/img/corona_new.jpg' }}"><img
                                    src="{{ url('/').'/img/corona_new.jpg' }}" alt="Image" height="350"></a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>

@include('frontend.layouts.footer')

@endsection