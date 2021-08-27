
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Barber</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
                        <h3>Artikel</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end -->


    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @foreach ($informations as $item)
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="{{asset('assets/photo-pet/'.$item->photo)}}" alt="">
                                    <a href="#" class="blog_item_date">
                                        <h3>{{$item->created_at->isoFormat('d')}}</h3>
                                        <p>{{$item->created_at->isoFormat('MMM')}}</p>
                                    </a>
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="{{route('pengguna.information.detail', $item->id)}}">
                                        <h2>{{$item->title}}</h2>
                                    </a>
                                    <p>{!! \Illuminate\Support\Str::limit($item->content, 140, $end='...') !!}</p>
                                    <ul class="blog-info-link">
                                        <li><a href="#"><i class="fa fa-user"></i> {{$item->adminRef->name}}</a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i> {{$item->comment_count}} Komentar</a></li>
                                        <li><a href="#"><i class="fas fa-map-marker-alt"></i> {{$item->location}}</a></li>
                                    </ul>
                                </div>
                            </article>
                        @endforeach

                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Search Keyword'
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Search Keyword'">
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
    <!--================Blog Area =================-->

    <!-- footer_start  -->
    @include('landing._partials.footer')
    <!-- footer_end  -->

     {{-- Chat --}}
     @include('landing._partials.chat')

     <script src="{{ asset('js/app.js') }}"></script>
     @include('landing._partials.js')

 
</body>
</html>