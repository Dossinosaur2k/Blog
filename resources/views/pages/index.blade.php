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

   

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text">
      <div class="container-fluid">
        <div class="owl-banner owl-carousel">
          @foreach ($posts as $post)
          <div class="item" style="background-image: url('{{ asset('assets/images/img_database/'.$post->image_path) }}'); padding-top:70%; background-size:cover;" >
            {{-- <img src="{{ asset('assets/images/img_database/'.$post->image_path) }}" alt=""> --}}
            <div class="item-content">
              
              <div class="main-content">
                <div class="meta-category">
                  <span>{{ $post->category->name }}</span>
                </div>

                <a href="car-details.html"><h4 
                  style="
                
                  overflow:hidden;
                  display:-webkit-box;
                  -webkit-box-orient:vertical;
                  -webkit-line-clamp:1;
                  ">
                  {{ $post->title }}
                </h4>
              </a>

                <ul class="post-info">
                  <li>{{  date("d-m-Y",strtotime($post->created_at))  }}</li> 
                  <li>12 comments</li>
                </ul>
              </div>
            
            </div>
          </div>
          @endforeach
         
          {{-- <div class="item">
            <img src="assets/images/blog-2-720x480.jpg" alt="">
            <div class="item-content">
              
              <div class="main-content">
                <div class="meta-category">
                  <span>Nature</span>
                </div>

                <a href="car-details.html"><h4>Lorem ipsum dolor sit amet.</h4></a>

                <ul class="post-info">
                  <li>John Doe</li>
                  <li>22.07.2020 14:20</li>
                  <li>12 comments</li>
                </ul>
              </div>
            
            </div>
          </div>
          <div class="item">
            <img src="assets/images/blog-3-720x480.jpg" alt="">
            <div class="item-content">
              
              <div class="main-content">
                <div class="meta-category">
                  <span>Sport</span>
                </div>

                <a href="car-details.html"><h4>Lorem ipsum dolor sit amet.</h4></a>

                <ul class="post-info">
                  <li>John Doe</li>
                  <li>22.07.2020 14:20</li>
                  <li>12 comments</li>
                </ul>
              </div>
            
            </div>
          </div>
          <div class="item">
            <img src="assets/images/blog-4-720x480.jpg" alt="">
            <div class="item-content">
              
              <div class="main-content">
                <div class="meta-category">
                  <span>Entertainment</span>
                </div>

                <a href="car-details.html"><h4>Lorem ipsum dolor sit amet.</h4></a>

                <ul class="post-info">
                  <li>John Doe</li>
                  <li>22.07.2020 14:20</li>
                  <li>12 comments</li>
                </ul>
              </div>
            
            </div>
          </div>
          <div class="item">
            <img src="assets/images/blog-5-720x480.jpg" alt="">
            <div class="item-content">
              
              <div class="main-content">
                <div class="meta-category">
                  <span>Lifestyle</span>
                </div>

                <a href="car-details.html"><h4>Lorem ipsum dolor sit amet.</h4></a>

                <ul class="post-info">
                  <li>John Doe</li>
                  <li>22.07.2020 14:20</li>
                  <li>12 comments</li>
                </ul>
              </div>
            
            </div>
          </div>
          <div class="item">
            <img src="assets/images/blog-6-720x480.jpg" alt="">
            <div class="item-content">
              <div class="main-content">
                <div class="meta-category">
                  <span>Sport</span>
                </div>

                <a href="car-details.html"><h4>Lorem ipsum dolor sit amet.</h4></a>

                <ul class="post-info">
                  <li>John Doe</li>
                  <li>22.07.2020 14:20</li>
                  <li>12 comments</li>
                </ul>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <section class="blog-posts grid-system">
      <div class="container">
        <div class="all-blog-posts">
          <h2 class="text-center">Bitcoin news</h2>
          <br>
          <div class="row">
           
              @foreach ($posts as $post)
                @if ($post->category->name == 'Bitcoin')
                <div class="col-md-4 col-sm-6">
                <div class="blog-post">
                  <div class="blog-thumb" style="background-image: url('{{asset('assets/images/img_database/'.$post->image_path)}}'); background-size:cover; padding-top:50%;">
                  </div>
                  <div class="down-content">
                    <a href="blog-details.html"><h4
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
                      <li><a href="#">{{  date("d-m-Y",strtotime($post->created_at)) }}</a></li>
                      <li><a href="#"><i class="fa fa-comments" title="Comments"></i> 12</a></li>
                    </ul>
                  </div>
                </div>
                </div>
                @endif
              @endforeach
             
           
            {{-- <div class="col-md-4 col-sm-6">
              <div class="blog-post">
                <div class="blog-thumb">
                  <img src="assets/images/blog-5-720x480.jpg" alt="">
                </div>
                <div class="down-content">
                  <a href="blog-details.html"><h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4></a>
                  
                  <p>Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet eleifend.</p>

                  <ul class="post-info">
                    <li><a href="#">John Doe</a></li>
                    <li><a href="#">10.07.2020 10:20</a></li>
                    <li><a href="#"><i class="fa fa-comments" title="Comments"></i> 12</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="blog-post">
                <div class="blog-thumb">
                  <img src="assets/images/blog-6-720x480.jpg" alt="">
                </div>
                <div class="down-content">
                  <a href="blog-details.html"><h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4></a>
                  
                  <p>Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet eleifend.</p>

                  <ul class="post-info">
                    <li><a href="#">John Doe</a></li>
                    <li><a href="#">10.07.2020 10:20</a></li>
                    <li><a href="#"><i class="fa fa-comments" title="Comments"></i> 12</a></li>
                  </ul>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    </section>
@endsection