@extends('frontend.layouts.main')
@push('title')Posts @endpush
@push('home-active')active @endpush
@push('scripts')
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="{{ Str::limit(strip_tags($post->content), 120) }}">
<link rel="canonical" href="{{ url('/').'/'.$post->slug }}">
<meta property="og:locale" content="en_US">
<meta property="og:type" content="article">
<meta property="og:title" content="{{ $post->title }} - {{ website()->site_name }}">
<meta property="og:description" content="{{ Str::limit(strip_tags($post->content), 120) }}">
<meta property="og:url" content="{{ url('/').'/'.$post->slug }}">
<meta property="og:site_name" content="{{ website()->site_name }}">
<meta property="article:published_time" content="{{ $post->created_at }}">
<meta property="article:modified_time" content="{{ $post->updated_at }}">
<meta property="og:image" content="{{ url('/').$post->photo_path }}">
<meta name="author" content="{{ getUser($post->user)->name }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:label1" content="Written by">
<meta name="twitter:data1" content="{{ getUser($post->user)->name }}">
<meta name="twitter:title" content="{{ $post->title }} - {{ website()->site_name }}">
<meta name="twitter:description" content="{{ Str::limit(strip_tags($post->content), 120) }}">
<meta name="twitter:image" content="{{ url('/').$post->photo_path }}">
<meta name="description" content="{{ Str::limit(strip_tags($post->content), 120) }}">
<meta name="keywords" content="{{getMetaTags($post->id)}}">
@endpush
@section('content')
@include('frontend.layouts.navbar')
<div style="max-width: 800px; margin: auto;">
  <div class="container">
    <div class="row">
      <h1 class="sn-title my-3">{{ $post->title }}</h1>

      <div class="p-2">
        <img src="{{ $post->photo_path }}" alt="{{ $post->photo_name }}" class="rounded responsive">
      </div>
      <a class="sn-author text-dark mb-3 mt-1" href="javascript:void(0);">
        <img src="{{ getUser($post->user)->photo_path }}" alt="User Image"
          style="height: 40px; width:40px; border-radius: 50%;">
        <strong>{{ getUser($post->user)->name }}</strong>
      </a>
      <div class="row">
        <a class="sn-date text-dark" href="javascript:void(0);"><i class="far fa-clock"></i> {{
          dateHuman($post->updated_at) }} - ({{ $post->updated_at }}) </a>
        <div>
          <i class="fa fa-tags" aria-hidden="true"></i>
          @if (count($post->tags))
          @foreach($post->tags as $tag)
          <label class="badge bg-primary">{{ $tag->name }}</label>
          @endforeach
          @else
          <span class="badge bg-secondary">No tags</span>
          @endif
        </div>
      </div>

      <div class="sn-content">
        <div>{!! $post->content !!}</div>
      </div>

      <div class="my-3 post-like" data-id="{{ $post->id }}">
        @guest
        <a href="#!" class="btn btn-theme text-light rounded disabled" disabled>
          @else
          <a href="javascript:void(0);"
            class="like-btn btn btn-theme text-light rounded @if ($post->isLikedBy(Auth::user()))liked @endif">
            @endguest
            @if ($post->isLikedBy(Auth::user()))
            <i class="fas fa-thumbs-up post-like-btn" aria-hidden="true"></i>
            @else
            <i class="far fa-thumbs-up post-like-btn" aria-hidden="true"></i>
            @endif
            <span id="post-like-count">{{ $post->likers()->count() }}</span>
          </a>
      </div>

      <div class="comments">
        @guest
        <h3 class="text-danger">Please login to add comments.</h3>
        @else
        <form action="{{ route('create_comment') }}" method="post" class="card shadow-lg p-3 mb-5 rounded">
          @csrf
          <h5>Add a comment</h5>
          <div class="form-group">
            <textarea name="cmt" id="cmt" rows="5" class="form-control h-100"></textarea>
          </div>
          <input type="hidden" name="post_id" value="{{ $post->id }}">
          <button class="btn-theme text-light w-25">Submit</button>
        </form>
        @endguest
        <h4>{{ getCommentCount($post->id) }} Comments</h4>
        <div class="card shadow-lg p-3 mb-5 rounded">
          @foreach ($comments as $comment)
          <div class="d-flex flex-direction-row" id="comments">
            <div class="mx-2">
              <img src="{{ getUser($comment->user)->photo_path }}" alt="User Photo" class="rounded-circle" height="50px"
                width="50px">
            </div>
            <div class="">
              <h5>
                {{ getUser($comment->user)->name }}
                @if (getUser($comment->user)->id == getUser($post->user)->id)
                <span class="badge bg-primary badge-sm">Author</span>
                @endif
              </h5>
              <span class="text-muted">{{ dateHuman($comment->created_at) }}</span>
              <p>{{ $comment->comment }}</p>


              <div class="likes my-3 comment-like" data-id="{{ $comment->id }}">
                @guest
                <a href="#!" class="btn btn-theme btn-sm text-light rounded disabled" disabled>
                  5
                  <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                </a>
                <a href="#reply_{{ $comment->id }}" class="btn btn-theme btn-sm text-light rounded disabled"
                  data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="reply" disabled>
                  <i class="fa fa-reply" aria-hidden="true"></i> Reply
                </a>
                @else
                <a href="javascript:void(0);"
                  class="likeCMT-btn likeCMT-btn-{{ $comment->id }} btn-theme text-light rounded @if ($comment->isLikedBy(Auth::user()))liked @endif">
                  @if ($comment->isLikedBy(Auth::user()))
                  <i class="fas fa-thumbs-up cmt-like-{{ $comment->id }}" aria-hidden="true"></i>
                  @else
                  <i class="far fa-thumbs-up cmt-like-{{ $comment->id }}" aria-hidden="true"></i>
                  @endif
                  <span id="cmt-like-count-{{ $comment->id }}">{{ $comment->likers()->count() }}</span>
                </a>
                <a href="#reply_{{ $comment->id }}" class="btn btn-theme btn-sm text-light rounded"
                  data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="reply">
                  <i class="fa fa-reply" aria-hidden="true"></i> Reply
                </a>
                @endguest
              </div>

              <div class="collapse" id="reply_{{ $comment->id }}">
                <div class="replies">
                  <form action="{{ route('create_reply') }}" method="post"
                    class="responsive2 shadow-lg p-3 mb-5 rounded">
                    @csrf
                    <h5>Add a reply</h5>
                    <div class="form-group">
                      <textarea name="reply" rows="5"
                        class="form-control h-100">#{{ getUser($comment->user)->name }} </textarea>
                    </div>
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="hidden" name="cmt_id" value="{{ $comment->id }}">
                    <button class="btn btn-theme btn-sm text-light w-25">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <hr>

          @foreach ($replies as $reply)
          @if ($comment->id == $reply->parent)

          <div class="d-flex flex-direction-row mx-5 mt-2" id="replies">
            <div class="mx-2">
              <img src="{{ getUser($reply->user)->photo_path }}" alt="User Photo" class="rounded-circle" height="50px"
                width="50px">
            </div>
            <div class="">
              <h5>
                {{ getUser($reply->user)->name }}
                @if (getUser($reply->user)->id == getUser($post->user)->id)
                <span class="badge bg-primary badge-sm">Author</span>
                @endif
              </h5>
              <span class="text-muted">{{ dateHuman($reply->created_at) }}</span>
              <p>{{ $reply->comment }}</p>

              <div class="likes my-3 reply-like" data-id="{{ $reply->id }}">
                @guest
                <a href="#!" class="btn btn-theme btn-sm text-light rounded disabled" disabled>
                  5
                  <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                </a>
                <a href="#reply_{{ $reply->id }}" class="btn btn-theme btn-sm text-light rounded disabled"
                  data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="reply" disabled>
                  <i class="fa fa-reply" aria-hidden="true"></i> Reply
                </a>
                @else
                <a href="javascript:void(0);"
                  class="likeRly-btn likeRly-btn-{{ $reply->id }} btn-theme text-light rounded @if ($reply->isLikedBy(Auth::user()))liked @endif">
                  @if ($reply->isLikedBy(Auth::user()))
                  <i class="fas fa-thumbs-up rly-like-{{ $reply->id }}" aria-hidden="true"></i>
                  @else
                  <i class="far fa-thumbs-up rly-like-{{ $reply->id }}" aria-hidden="true"></i>
                  @endif
                  <span id="rly-like-count-{{ $reply->id }}">{{ $reply->likers()->count() }}</span>
                </a>
                <a href="#reply_{{ $reply->id }}" class="btn btn-theme btn-sm text-light rounded"
                  data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="reply">
                  <i class="fa fa-reply" aria-hidden="true"></i> Reply
                </a>
                @endguest
              </div>
              <div class="collapse" id="reply_{{ $reply->id }}">
                <div class="replies">
                  <form action="{{ route('create_reply') }}" method="post"
                    class="responsive2 shadow-lg p-3 mb-5 rounded">
                    @csrf
                    <h5>Add a reply</h5>
                    <div class="form-group">
                      <textarea name="reply" rows="5"
                        class="form-control h-100">#{{ getUser($reply->user)->name }} </textarea>
                    </div>
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="hidden" name="cmt_id" value="{{ $comment->id }}">
                    <button class="btn btn-theme btn-sm text-light w-25">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <hr>
          @endif
          @endforeach
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

@include('frontend.layouts.footer')

<script type="text/javascript">
  $(document).ready(function() {     

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.like-btn').click(function(){    
            let id = $(this).parents(".post-like").data('id');
            // let btn = $('#post-like-count').html();
          $.ajax({
              type:'POST',
              url:'/like',
              data:{id:id},
              
              success:function(data){
                if(jQuery.isEmptyObject(data.success.attached)){
                  if ($('.like-btn').hasClass('liked')) {
                    $('#post-like-count').html(parseInt($('#post-like-count').text())-1);
                    $('.like-btn').removeClass('liked');
                    $('.post-like-btn').removeClass('fas');
                    $('.post-like-btn').addClass('far');
                  } else {
                    $('#post-like-count').html(parseInt($('#post-like-count').text())+1);
                    $('.like-btn').addClass('liked');
                    $('.post-like-btn').removeClass('far');
                    $('.post-like-btn').addClass('fas');
                  }
                }
              }
          });                                        
        });

        // let id = $(this).parents(".comment-like").data('id');
        
        $('.likeCMT-btn').click(function(){    
            let id = $(this).parents(".comment-like").data('id');
            // let btn = $('#cmt-like-count').html();
          $.ajax({
              type:'POST',
              url:'/likecmt',
              data:{id:id},
              
              success:function(data){
                if(jQuery.isEmptyObject(data.success.attached)){
                  if ($('.likeCMT-btn-'+id).hasClass('liked')) {
                    $('#cmt-like-count-'+id).html(parseInt($('#cmt-like-count-'+id).text())-1);
                    $('.likeCMT-btn-'+id).removeClass('liked');
                    $('.cmt-like-'+id).removeClass('fas');
                    $('.cmt-like-'+id).addClass('far');
                  } else {
                    $('#cmt-like-count-'+id).html(parseInt($('#cmt-like-count-'+id).text())+1);
                    $('.likeCMT-btn-'+id).addClass('liked');
                    $('.cmt-like-'+id).removeClass('far');
                    $('.cmt-like-'+id).addClass('fas');
                  }
                }
              }
          });                                        
        });

        $('.likeRly-btn').click(function(){    
            let id = $(this).parents(".reply-like").data('id');
            // let btn = $('#cmt-like-count').html();
          $.ajax({
              type:'POST',
              url:'/likecmt',
              data:{id:id},
              
              success:function(data){
                if(jQuery.isEmptyObject(data.success.attached)){
                  if ($('.likeRly-btn-'+id).hasClass('liked')) {
                    $('#rly-like-count-'+id).html(parseInt($('#rly-like-count-'+id).text())-1);                    
                    $('.likeRly-btn-'+id).removeClass('liked');
                    $('.rly-like-'+id).removeClass('fas');
                    $('.rly-like-'+id).addClass('far');
                  } else {
                    $('#rly-like-count-'+id).html(parseInt($('#rly-like-count-'+id).text())+1);
                    $('.likeRly-btn-'+id).addClass('liked');
                    $('.rly-like-'+id).removeClass('far');
                    $('.rly-like-'+id).addClass('fas');
                  }
                }
              }
          });                                        
        });


    }); 

  //   let count = document.getElementById('like-count');
  //   let btn = document.getElementsByClassName('like-btn')[0];
  //   btn.addEventListener(function () {
  //     if (btn.classList.contains('liked')) {
  //       btn.classList.remove('liked');
  //       count.innerText = parseInt(count) - 1;
  //     } else {
  //       btn.classList.add('liked');
  //       count.innerText = parseInt(count) - 1;
  //     }
  // });
</script>

@endsection