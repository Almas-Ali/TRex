@extends('frontend.layouts.main') @push('title')Home @endpush @push('home-active')active @endpush @push('scripts')
<meta name="description" content="Home page of {{ website()->site_name }}" />
<link rel="canonical" href="{{ route('home') }}" />
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
    <p>
      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae officia doloribus expedita quaerat, quod quo ut atque esse totam? Tenetur quos quam, veritatis qui iste velit blanditiis dolores quo nam, cumque aliquid neque quia odio ab alias aspernatur maxime rem excepturi iusto? Est quam omnis cum quaerat, accusamus repellat nulla ipsa atque dolor ipsum vel pariatur maiores ullam voluptatum velit asperiores in veritatis illo. Animi quis minus at? Accusamus, voluptatum. Hic quo ipsa libero quidem, expedita debitis dicta obcaecati nemo? Tenetur, itaque a. Ipsum praesentium saepe asperiores libero illo, maxime, in perferendis voluptates at voluptatibus laudantium sit ea quae provident consequuntur fugit dolorum rem eveniet. Dolore architecto libero laboriosam eum accusantium placeat natus velit neque totam deserunt atque magni maxime fugiat corporis, voluptas unde corrupti! Distinctio deleniti dolorem possimus nemo dolores, explicabo qui velit officia ad nam commodi odit, laboriosam nisi ut, voluptatum necessitatibus quaerat rerum molestias? Quidem mollitia incidunt minus dolore vel ipsum cum, a laborum facilis ab modi quis libero nemo asperiores labore hic unde animi. Ipsa aut beatae adipisci. Corrupti facilis alias doloribus, vero asperiores reiciendis eius molestiae id explicabo aut aspernatur iure ipsa saepe, ad accusantium dolorem cumque! Beatae velit asperiores architecto ipsam ad aut vel ducimus id molestiae exercitationem! Neque, delectus facere! Reiciendis quibusdam enim aperiam quaerat est? Dolorem culpa placeat adipisci temporibus minus iure eaque optio sapiente dignissimos aliquid consequatur perferendis, veritatis mollitia ea a nostrum ducimus, modi, quae laudantium rem itaque. Molestias modi voluptatibus laudantium omnis vel inventore veritatis, cum earum tenetur alias corporis ullam. Molestiae expedita sit laborum doloribus omnis amet laudantium? Dolorem corporis quisquam sunt dolores autem harum nobis deserunt consequatur doloribus? In unde libero voluptatibus, consequuntur quaerat expedita excepturi molestiae quos numquam facere delectus? Obcaecati, similique voluptatum. Enim vitae, voluptate exercitationem excepturi fugit quaerat atque dolorem voluptatem dolores non facere numquam incidunt? Suscipit deserunt aliquid ad recusandae ipsam odit autem distinctio, nulla natus repellat ea tenetur dolores. Ipsam est maxime non quidem deserunt sit laudantium modi unde praesentium molestias fugit voluptates minima, harum natus at ut quae? Illo ratione rem et eius. Quam nostrum, atque, repellendus tempore unde error, optio sint eaque ducimus sunt sed beatae autem saepe necessitatibus corporis. Inventore facere neque accusantium cum! Quam quidem porro ex reiciendis quaerat minima amet repellat at saepe quis ea illum eligendi odit, dignissimos, nesciunt veritatis. Mollitia aperiam impedit quidem eligendi dolore ipsum fugit nulla amet nobis facilis, vitae consequatur porro ratione. Cumque, ea nobis asperiores eveniet quam soluta esse, necessitatibus suscipit hic iusto quibusdam ut? Sint ducimus numquam voluptatum commodi aut, culpa a minus, deserunt, deleniti quibusdam optio veniam dolor molestiae sapiente. Tenetur accusamus veritatis aperiam laudantium! Tempora facere atque recusandae saepe architecto, quod aliquam repudiandae voluptatibus asperiores ullam et labore qui ipsam debitis ab, dolore porro nobis consequuntur accusantium amet adipisci! Recusandae quasi repudiandae voluptatibus, explicabo obcaecati corporis ab provident minus magni! Cum quae recusandae nisi deserunt fuga? Quos, nobis reprehenderit architecto ipsam fugiat quis totam esse culpa veritatis, atque officia voluptatem autem cum quae pariatur. Dolorem mollitia consequuntur consequatur nihil vero rerum facere commodi architecto. Ratione perferendis earum blanditiis sunt voluptate quam voluptates ut amet aliquid, dolor ducimus eaque vero doloribus minima. Voluptatem vel, cumque repellendus similique quia impedit magnam dignissimos hic repellat eum dolorum sint facilis iste illo eos velit, nesciunt, quisquam numquam ipsam ab perferendis ea natus non! Molestias architecto nemo illo rem velit deleniti. Deserunt expedita porro facilis reiciendis cum repellat accusantium odit necessitatibus. Nostrum, incidunt, autem voluptatibus rem veritatis, perferendis soluta eos assumenda corporis doloribus itaque eaque asperiores distinctio! Dicta, tempora officia ea quae error sed officiis eos quisquam culpa sunt placeat molestias a itaque?
    </p>
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
              <div class="col-12 row p-2 rounded post-view">
                <div class="col-2">
                  <img src="{{ $post->photo_path }}" alt="{{ $post->photo_name }}" class="rounded my-2 post-img" />
                </div>
                <div class="col-10 d-flex flex-column justify-content-between">
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
                      {{ getCommentCount($post) }}
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
                  <span class="">{{ postCountCategory($category) }}</span>
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