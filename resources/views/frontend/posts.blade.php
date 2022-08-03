@extends('frontend.layouts.main')
@push('title')Posts @endpush
@push('home-active')active @endpush
@push('scripts')
<meta name="csrf-token" content="{{ csrf_token() }}">
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

      <div class="my-3 panel" data-id="{{ $post->id }}">
        <a href="#!" class="like-btn btn btn-theme text-light rounded @if ($post->isLikedBy(Auth::user()))liked @endif">
          <span id="like-count">{{ $post->likers()->count() }}</span>
          <i class="fa fa-thumbs-up" aria-hidden="true"></i>
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
          <button class="btn btn-theme w-25">Submit</button>
        </form>
        @endguest
        <h4>{{ getCommentCount($post->id) }} Comments</h4>
        <div class="card shadow-lg p-3 mb-5 rounded">
          @foreach ($comments as $comment)
          <div class="d-flex flex-direction-row" id="comments">
            <div class="mx-2">
              <img src="{{ url('/').'/img/badge.png' }}" alt="User Photo" class="rounded-circle" height="50px"
                width="50px">
            </div>
            <div class="">
              <h5>{{ getUser($comment->user)->name }}</h5>
              <span class="text-muted">{{ dateHuman($comment->created_at) }}</span>
              <p>{{ $comment->comment }}</p>


              <div class="likes my-3">
                <a href="#!" class="btn btn-primary rounded">
                  5
                  <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                </a>
                <a href="#!" class="btn btn-danger rounded">
                  1
                  <i class="fa fa-thumbs-down" aria-hidden="true"></i>
                </a>
                <a href="#reply" class="btn btn-primary rounded" data-bs-toggle="collapse" role="button"
                  aria-expanded="false" aria-controls="reply">
                  <i class="fa fa-reply" aria-hidden="true"></i> Reply
                </a>
              </div>

              <div class="collapse" id="reply">
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
                    <button class="btn btn-theme w-25">Submit</button>
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
              <img src="{{ url('/').'/img/badge.png' }}" alt="User Photo" class="rounded-circle" height="50px"
                width="50px">
            </div>
            <div class="">
              <h5>{{ getUser($reply->user)->name }}</h5>
              <span class="text-muted">{{ dateHuman($reply->created_at) }}</span>
              <p>{{ $reply->comment }}</p>

              <div class="likes my-3">
                <a href="#!" class="btn btn-primary rounded">
                  5
                  <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                </a>
                <a href="#!" class="btn btn-danger rounded">
                  1
                  <i class="fa fa-thumbs-down" aria-hidden="true"></i>
                </a>
                <a href="#!" class="btn btn-primary rounded">
                  <i class="fa fa-reply" aria-hidden="true"></i> Reply
                </a>
              </div>
            </div>
          </div>
          <hr>
          @endif
          @endforeach
          @endforeach
        </div>
      </div>

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
              <a href="{{ url('/').'/img/corona_new.jpg' }}"><img src="{{ url('/').'/img/corona_new.jpg' }}" alt="Image"
                  height="350"></a>
            </div>
          </div>
        </div>
      </div> --}}
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
            let id = $(this).parents(".panel").data('id');
            let btn = $('#like-count').html();
          $.ajax({
              type:'POST',
              url:'/like',
              data:{id:id},
              
              success:function(data){
                if(jQuery.isEmptyObject(data.success.attached)){
                  if ($(this).hasClass('liked')) {
                    $('#like-count').html(parseInt($('#like-count').text())+1);
                    $(this).removeClass('liked');
                  } else {
                    $('#like-count').html(parseInt($('#like-count').html())-1);
                    $(this).addClass('liked');
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