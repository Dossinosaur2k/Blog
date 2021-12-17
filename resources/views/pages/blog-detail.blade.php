@extends('pages.page_layouts.main')

@section('content')
    <div class="heading-page header-text">
    {{-- <section class="page-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="text-content">
              <h4>Post Details</h4>
              <h2>Single blog post</h2>
            </div>
          </div>
        </div>
      </div>
    </section> --}}
     </div>
  
  <!-- Banner Ends Here -->
  <section class="blog-posts grid-system">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="all-blog-posts">
            <div class="row">
              <div class="col-lg-12">
                <div class="blog-post">
                  {{-- <div class="blog-thumb">
                    <img src="{{ asset('assets/images/img_database/'.$post->image_path) }}" alt="">
                  </div> --}}
                  <div class="down-content">
                    <a href="blog-details.html"><h4>{{ $post->title }}</h4></a>
                    <ul class="post-info">
                      <li><a href="#">{{ date("d-m-Y",strtotime($post->created_at)) }}</a></li>
                      <li><a href="#"><i class="fa fa-comments" title="Comments"></i> {{ count($post->comments) }}</a></li>
                    </ul>
                    <div style="background-image: url('{{ asset('assets/images/img_database/'.$post->image_path) }}'); padding-top:70%; background-size:cover; background-repeat:no-repeat;">
                    
                    </div>
                    <p>
                        {{ $post->content }}
                    </p>
                    <div class="post-options">
                      <div class="row">
                        <div class="col-6">
                          
                        </div>
                        <div class="col-6">
                          <ul class="post-share">
                            <li><i class="fa fa-share-alt"></i></li>
                            <li><a href="#">Facebook</a>,</li>
                            <li><a href="#"> Twitter</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="sidebar-item comments">
                  <div class="sidebar-heading">
                    <h2>{{ count($post->comments) }} comments</h2>
                  </div>
                  <div class="content">
                    @if(!empty($post->comments))
                    <ul class="d-flex flex-column">
                      @foreach ($post->comments as $comment)
                      <li>
                        <div class="right-content" style="margin-left:16px;">
                          <h4>{{ $comment->author }}<span>{{ date("d-m-Y",strtotime($comment->created_at)) }}</span></h4>
                          <p> {{ $comment->body }} </p>
                          @if(Auth::check())
                            <form action="{{ route('comments.destroy',['comment' => $comment->id]) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" type="submit"> delete </button>
                            </form>
                            
                          @endif
                          <button class="btn btn-primary"> reply </button>
                        </div>
                      </li>
                      @endforeach
                    </ul>
                      @endif
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="sidebar-item submit-comment">
                  <div class="sidebar-heading">
                    <h2>Your comment</h2>
                  </div>
                  <div class="content">
                    <form id="comment" action="{{ route('comments.store') }}" method="post">
                      @csrf
                      <div class="row">
                        <input name="id_post" type="hidden" id="id_post" value="{{ $post->id }}" >
                        <div class="col-md-12 col-sm-12">
                          <fieldset>
                            <input name="name" type="text" id="name" placeholder="Your name" required="">
                          </fieldset>
                        </div>
                        <div class="col-lg-12">
                          <fieldset>
                            <textarea name="message" rows="6" id="message" placeholder="Type your comment" required=""></textarea>
                          </fieldset>
                        </div>
                        <div class="col-lg-12">
                          <fieldset>
                            <button type="submit" id="form-submit" class="main-button">Submit</button>
                          </fieldset>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="sidebar">
            <div class="row">
              <div class="col-lg-12">
                <div class="sidebar-item search">
                  <form id="search_form" name="gs" method="GET" action="#">
                    <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                  </form>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="sidebar-item recent-posts">
                  <div class="sidebar-heading">
                    <h2>Recent Posts</h2>
                  </div>
                  <div class="content">
                    <ul>
                      <li><a href="blog-details.html">
                        <h5>Vestibulum id turpis porttitor sapien facilisis scelerisque</h5>
                        <span>May 31, 2020</span>
                      </a></li>
                      <li><a href="blog-details.html">
                        <h5>Suspendisse et metus nec libero ultrices varius eget in risus</h5>
                        <span>May 28, 2020</span>
                      </a></li>
                      <li><a href="blog-details.html">
                        <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, numquam.</h5>
                        <span>May 14, 2020</span>
                      </a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection