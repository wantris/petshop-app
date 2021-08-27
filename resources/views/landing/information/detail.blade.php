
<!doctype html>
<html class="no-js" lang="zxx">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>{{$info->title}}</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- <link rel="manifest" href="site.webmanifest"> -->
   <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
   <!-- Place favicon.ico in the root directory -->

   <!-- CSS here -->
    @include('landing._partials.css')
   <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
   <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header_start  -->
    @include('landing._partials.navbar')
  <!-- header_start  -->

  <!-- bradcam_area_start -->
  <div class="bradcam_area breadcam_bg">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="bradcam_text text-center">
                      <h3>{{$info->title}}</h3>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- bradcam_area_end -->

   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="{{asset('assets/photo-pet/'.$info->photo)}}" alt="">
                  </div>
                  <div class="blog_details">
                     <h2>{{$info->title}}
                     </h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="fa fa-user"></i> {{$info->adminRef->name}}</a></li>
                        <li><a href="#"><i class="fa fa-comments"></i> {{$info->comment_count}} Komentar</a></li>
                     </ul>
                     {!!$info->content!!}
                  </div>
               </div>
               <div class="navigation-top">
                  <div class="d-sm-flex justify-content-between text-center">
                     {{-- <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
                        people like this</p> --}}
                     <div class="col-sm-4 text-center my-2 my-sm-0">
                        <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                     </div>
                     {{-- <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                     </ul> --}}
                  </div>
               </div>
               <div class="comments-area">
                    <h4>{{$info->comment_count}} Komentar</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    @foreach ($info->commentRef as $comment)
                                        @if (!$comment->parent_id)
                                            <div class="media mb-5"> 
                                                @if ($comment->userRef)
                                                    @if ($comment->userRef->photo)
                                                        <img class="mr-3 rounded-circle" alt="Bootstrap Media Preview" src="{{asset('asset-landing/photo-profil/'.$comment->userRef->photo)}}" />
                                                    @else
                                                        <img class="mr-3 rounded-circle" alt="Bootstrap Media Preview" src="{{asset('asset-landing/pengguna_icon2.png')}}" />
                                                    @endif
                                                @else
                                                    <img class="mr-3 rounded-circle" alt="Bootstrap Media Preview" src="{{asset('asset-landing/pengguna_icon2.png')}}" />
                                                @endif
                                                <div class="media-body">
                                                    <div class="row">
                                                        <div class="col-8 d-flex">
                                                            <h5>
                                                            @if ($comment->userRef)
                                                                {{$comment->userRef->name}}
                                                            @else
                                                                {{$comment->adminRef->name}}
                                                            @endif    
                                                            </h5><span class="text-secondary"> - <small>{{$comment->created_at->isoFormat('MMM D, YYYY')}}</small></span>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="pull-right reply"> <a data-toggle="collapse" href="#comment-box-{{$comment->id}}" role="button" aria-expanded="false" aria-controls="comment-box-{{$comment->id}}"><span><i class="fa fa-reply"></i> reply</span></a> </div>
                                                        </div>
                                                    </div> {{$comment->comment}}
                                                    <div class="comment-box collapse mt-3 mb-3" id="comment-box-{{$comment->id}}">
                                                        <form action="{{route('pengguna.information.comment.reply')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="parent_id" value="{{$comment->id}}">
                                                            <input type="hidden" name="information_id" value="{{$info->id}}">
                                                            
                                                            <div class="form-group">
                                                                <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                                                    placeholder="Write Comment"></textarea>
                                                            </div>
                                                            <div class="form-group mt-3">
                                                                <input type="submit" value="Kirim" style="font-size: 14px" class="btn btn-orange">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    @if ($comment->commentChildRef->count() > 0)
                                                        @foreach ($comment->commentChildRef as $child)
                                                            <div class="media mt-4"> <a class="pr-3" href="#">
                                                                @if ($child->userRef)
                                                                    @if ($child->userRef->photo)
                                                                        <img class="rounded-circle" alt="Bootstrap Media Another Preview" src="{{asset('asset-landing/photo-profil/'.$child->userRef->photo)}}" />
                                                                    @else
                                                                        <img class="rounded-circle" alt="Bootstrap Media Another Preview" src="{{asset('asset-landing/pengguna_icon2.png')}}" />
                                                                    @endif
                                                                @else
                                                                    <img class="rounded-circle" alt="Bootstrap Media Another Preview" src="{{asset('asset-landing/pengguna_icon2.png')}}" />
                                                                @endif
                                                            </a>
                                                                <div class="media-body">
                                                                    <div class="row">
                                                                        <div class="col-12 d-flex">
                                                                            <h5>
                                                                                @if ($child->userRef)
                                                                                    {{$child->userRef->name}}
                                                                                @else
                                                                                    {{$child->adminRef->name}}
                                                                                @endif      
                                                                            </h5> <span class="text-secondary">- <small>{{$child->created_at->isoFormat('MMM D, YYYY')}}</small></span>
                                                                        </div>
                                                                    </div> {{$child->comment}}.
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
               <div class="comment-form">
                  <h4>Tinggalkan Komentar</h4>
                  <form class="form-contact comment_form" action="{{route('pengguna.information.comment.save')}}" method="post" id="commentForm">
                    @csrf
                     <div class="row">
                        <div class="col-12">
                            <input type="hidden" name="information_id" value="{{$info->id}}">

                            <div class="form-group">
                                <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                    placeholder="Write Comment"></textarea>
                            </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <button type="submit" class="button button-contactForm btn_1 boxed-btn">Kirim</button>
                     </div>
                  </form>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  <aside class="single_sidebar_widget search_widget">
                     <form action="#">
                        <div class="form-group">
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder='Search Keyword'
                                 onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                              <div class="input-group-append">
                                 <button class="btn" type="button"><i class="ti-search"></i></button>
                              </div>
                           </div>
                        </div>
                        <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                           type="submit">Search</button>
                     </form>
                  </aside>
                  <aside class="single_sidebar_widget popular_post_widget">
                     <h3 class="widget_title">Informasi Hewan Terbaru</h3>
                     @foreach ($recents as $recent)
                            <div class="media post_item">
                                <img src="{{asset('assets/photo-pet/'.$recent->photo)}}" style="width: 50px; height:50px" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>{!! \Illuminate\Support\Str::limit($recent->title, 30, $end='...') !!}</h3>
                                    </a>
                                    <p>{{$recent->created_at->isoFormat('MMM D, YYYY')}}</p>
                                </div>
                            </div>
                        @endforeach
                  </aside>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--================ Blog Area end =================-->

    <!-- footer_start  -->
        @include('landing._partials.footer')
    <!-- footer_end  -->


   <!-- JS here -->
  @include('landing._partials.js')


</body>

</html>