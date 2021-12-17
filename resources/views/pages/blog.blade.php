@extends('pages.page_layouts.main')

@section('content')
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    <div class="heading-page header-text">
      <div class="container"> 
        <div class="row">
          <div class="col-lg-12">
            <div class="text-content">
                <h4> All News </h4>
            </div>
          </div>
        </div>
      </div>
        {{-- <section class="page-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="text-content">
                  <h4>Blog</h4>
                  <h2>Our Recent Blog Posts</h2>
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
                @foreach ($reponse['posts']->data as $post)   
                  <div class="col-lg-6">
                    <div class="blog-post">
                      <div class="blog-thumb" style="background-image: url('{{ asset('assets/images/img_database/'.$post->image_path) }}'); padding-top:70%; background-size:cover; background-repeat:no-repeat;" >
                      </div>
                      <div class="down-content">
                        <a href="{{ route('blog.show',['id' => $post->id]) }}"><h4
                        style="
                        overflow:hidden;
                            display:-webkit-box;
                            -webkit-box-orient:vertical;
                            -webkit-line-clamp:1;
                        "
                         >{{ $post->title }}</h4></a>                        
                         <p style="
                        overflow:hidden;
                        display:-webkit-box;
                        -webkit-box-orient:vertical;
                        -webkit-line-clamp:3;
                        padding:0;
                        ">
                        {{ $post->content }}
                    </p>
                        <ul class="post-info">
                          <li><a href="#">{{ date("d-m-Y",strtotime($post->created_at))}}</a></li>
                          <li><a href="#"><i class="fa fa-comments" title="Comments"></i> {{ count($reponse['comments'][$post->id]) }}</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                @endforeach
             
                  <div class="col-lg-12">
                    <ul class="page-numbers">
                      <li class="disabled"><a href="{{ $reponse['posts']->links[0]->url }}"><i class="fa fa-angle-double-left"></i></a></li>
                      @for($i=1;$i<count($reponse['posts']->links)-1;$i++) 
                        <li class="@if( (URL()->full()) == ($reponse['posts']->links[$i]->url) ) active @endif"><a href="{{ $reponse['posts']->links[$i]->url }}">{{ $i }}</a></li>
                      @endfor
                      <li class="@if(!$reponse['posts']->links[count($reponse['posts']->links)-1]->url) disabled @endif"><a href="{{ $reponse['posts']->links[count($reponse['posts']->links)-1]->url  }}"><i class="fa fa-angle-double-right"></i></a></li>
                    </ul>
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
                        <h2>Popular Posts</h2>
                      </div>
                      <div class="content">
                        <ul>
                          @foreach ($reponse['popularposts'] as $key => $value)   
                              @foreach ($reponse['post_cmt'] as $post)   
                                @if ($key == $post->id)
                                <li><a href="blog-details.html">
                                  <h5>{{ $post->title }}</h5>
                                  <span>May 31, 2020</span>
                                  <span> lượt xem {{ $value }} </span>
                                </a></li>
                                @endif
                              
                            @endforeach
                          @endforeach
                          
                         
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="sidebar-item categories">
                      <div class="sidebar-heading">
                        <h2>Categories</h2>
                      </div>
                      <div class="content">
                        <ul>
                          @foreach ($reponse['categories'] as $category)
                          <li><a href="{{ route('category.post',['category' => $category->id]) }}">{{ $category->name }}</a></li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="sidebar-item tags">
                      <div class="sidebar-heading">
                        <h2>Tag Clouds</h2>
                      </div>
                      <div class="content">
                        <ul>
                          <li><a href="#">Lorem</a></li>
                          <li><a href="#">Ipsum</a></li>
                          <li><a href="#">Dolor</a></li>
                          <li><a href="#">Sit</a></li>
                          <li><a href="#">Amet</a></li>
                          <li><a href="#">Consetur</a></li>
                          <li><a href="#">Adiping</a></li>
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