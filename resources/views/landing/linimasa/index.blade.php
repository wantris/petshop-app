
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lini Masa</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('landing._partials.css')
    
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>

    <!-- header_start  -->
        @include('landing._partials.navbar')
    <!-- header_start  -->

    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcam_text text-center">
                        <h3>Lini Masa</h3>
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
                            @if (Session::get('id_pengguna'))
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <div class="card shadow-card" style=" border-radius:20px">
                                            <div class="card-body">
                                                <form action="{{route('pengguna.account.post.save')}}" enctype="multipart/form-data" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-1">
                                                            @if ($pengguna->photo)
                                                                <img class="rounded-circle mr-4" src="{{asset('asset-landing/photo-profil/'.$pengguna->photo)}}" width="40">
                                                            @else
                                                                <img class="rounded-circle mr-4" src="{{asset('asset-landing/pengguna_icon2.png')}}" width="40">
                                                            @endif
                                                        </div>
                                                        <div class="col-11">
                                                            <textarea name="content" class="form-control ml-1 shadow-none textarea">Apa yang anda pikirkan</textarea>
                                                        </div>
                                                        <div class="col-12">
                                                            <hr>
                                                        </div>
                                                        <div class="col-12 text-center">
                                                            <a href="#" onclick="uploadPhoto()" style="text-decoration: none !important"><img class="mr-2" src="{{asset('asset-landing/img/icon/image-icon.svg')}}" width="30" alt=""><span style="font-size: 13px">Upload Foto</span></a>
                                                            <input type="file" name="photo" onchange="displayPhoto()" style="display: none" id="photo-inp">
                                                        </div>
                                                        <div class="col-12">
                                                            <input type="submit" value="Kirim" style="font-size:13px " class="btn btn-orange btn-block mt-3" >
                                                        </div>
                                                        <div class="col-12 mt-3 d-none" id="photo-container">
                                                            <img class="mr-4" src="" id="post-image-upload" width="200">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="d-flex justify-content-center row">
                                @foreach ($posts as $post)
                                    <div class="col-12 mb-4">
                                        <div class="d-flex flex-column comment-section px-3 py-3 shadow-card">
                                            <div class="bg-white p-2">
                                                <div class="d-flex flex-row user-info">
                                                    @if ($post->userRef)
                                                        @if ($post->userRef->photo)
                                                            <img class="rounded-circle" src="{{asset('asset-landing/photo-profil/'.$post->userRef->photo)}}" width="40">
                                                        @else
                                                            <img class="rounded-circle" src="{{asset('asset-landing/pengguna_icon2.png')}}" width="40">
                                                        @endif
                                                    @else
                                                        <img class="rounded-circle" src="{{asset('asset-landing/pengguna_icon2.png')}}" width="40">
                                                    @endif
                                                    <div class="d-flex flex-column justify-content-start ml-2">
                                                        <span class="d-block font-weight-bold name">
                                                            @if ($post->userRef)
                                                                {{$post->userRef->name}}
                                                            @else
                                                                {{$post->adminRef->name}}
                                                            @endif
                                                        </span>
                                                        <span class="date text-black-50">Shared publicly - {{$post->created_at->isoFormat('d MMM YYYY')}}</span></div>
                                                </div>
                                                <div class="mt-2">
                                                    <p class="comment-text">{{$post->content}}</p>
                                                </div>
                                            </div>
                                            <div class="bg-white">
                                                <div class="d-flex flex-row fs-12">
                                                    <div class="like p-2 cursor"><i class="far fa-thumbs-up"></i><span class="ml-1">Like</span></div>
                                                    <div class="like p-2 cursor"><a class="text-dark" data-toggle="collapse" href="#comment-container-{{$post->id}}" role="button" aria-expanded="false" aria-controls="comment-container-collapse"><i class="far fa-comments"></i><span class="ml-1">Comment</span></a></div>
                                                    <div class="like p-2 cursor"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
                                                    <div class="like p-2 cursor text-primary"><i class="far fa-check-circle "></i><span class="ml-1">Tervalidasi</span></div>
                                                </div>
                                            </div>
                                            <div class="collapse" id="comment-container-{{$post->id}}">
                                                <form action="{{route('pengguna.account.post.comment.save')}}" method="post">
                                                    @csrf
                                                    <div class="bg-light p-2">
                                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                                        <div class="d-flex flex-row align-items-start">
                                                            @if ($post->userRef)
                                                                @if ($post->userRef->photo)
                                                                    <img class="rounded-circle" src="{{asset('asset-landing/photo-profil/'.$post->userRef->photo)}}" width="40">
                                                                @else
                                                                    <img class="rounded-circle" src="{{asset('asset-landing/pengguna_icon2.png')}}" width="40">
                                                                @endif
                                                            @else
                                                                <img class="rounded-circle" src="{{asset('asset-landing/pengguna_icon2.png')}}" width="40">
                                                            @endif
                                                            <textarea class="form-control ml-1 shadow-none textarea" name="comment"></textarea>
                                                        </div>
                                                        <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" type="submit">Post comment</button><button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Cancel</button></div>
                                                    </div>
                                                </form>
                                                <div class="media mb-5 mt-4">
                                                    @if ($post->commentRef->count() > 0)
                                                        @foreach ($post->commentRef as $comment)
                                                            @if (!$comment->parent_id)
                                                                @if ($comment->userRef)
                                                                    @if ($comment->userRef->photo)
                                                                        <img class="mr-3 rounded-circle" alt="Bootstrap Media Preview" src="{{asset('asset-landing/photo-profil/'.$comment->userRef->photo)}}" />
                                                                    @else
                                                                        <img class="mr-3 rounded-circle" alt="Bootstrap Media Preview" src="{{asset('asset-landing/pengguna_icon2.png')}}" />
                                                                    @endif
                                                                @else
                                                                    <img class="mr-3 rounded-circle" alt="Bootstrap Media Preview" src="{{asset('asset-landing/pengguna_icon2.png')}}" />
                                                                @endif
                                                                <div class="media-body" style="font-size: 12px !important">
                                                                    <div class="row">
                                                                        <div class="col-8">
                                                                            <h5 class="mr-3">
                                                                                @if ($comment->userRef)
                                                                                    {{$comment->userRef->name}}
                                                                                @else
                                                                                    {{$comment->adminRef->name}}
                                                                                @endif
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="pull-right reply"> <a data-toggle="collapse" href="#comment-box-{{$comment->id}}" role="button" aria-expanded="false" aria-controls="comment-box-{{$comment->id}}"><span><i class="fa fa-reply"></i> reply</span></a> </div>
                                                                        </div>
                                                                    </div>
                                                                    {{$comment->comment}}
                                                                    <div class="comment-box collapse mt-3 mb-3" id="comment-box-{{$comment->id}}">
                                                                        <form action="{{route('pengguna.account.post.comment.reply')}}" method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="parent_id" value="{{$comment->id}}">
                                                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                                                            
                                                                            <div class="form-group">
                                                                                <textarea class="form-control ml-1 shadow-none textarea" name="comment"></textarea>
                                                                            </div>
                                                                            <div class="form-group mt-3">
                                                                                <input type="submit" value="Kirim" style="font-size: 14px" class="btn btn-orange">
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    @if ($comment->commentChildRef->count() > 0)
                                                                        @foreach ($comment->commentChildRef as $childComment)
                                                                            <div class="media mt-4"> 
                                                                                <a class="pr-3" href="#">
                                                                                    @if ($childComment->userRef)
                                                                                        @if ($childComment->userRef->photo)
                                                                                            <img class="rounded-circle" alt="Bootstrap Media Another Preview" src="{{asset('asset-landing/photo-profil/'.$childComment->userRef->photo)}}" />
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
                                                                                                @if ($childComment->userRef)
                                                                                                    {{$childComment->userRef->name}}
                                                                                                @else
                                                                                                    {{$childComment->adminRef->name}}
                                                                                                @endif
                                                                                            </h5> <span class="text-secondary">- <small>{{$childComment->created_at->isoFormat('MMM D, YYYY')}}</small></span>
                                                                                        </div>
                                                                                    </div> {{$childComment->comment}}.
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                @endforeach
                            </div>
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

     <script>
         const uploadPhoto = () => {
            event.preventDefault();
            $('#photo-inp').trigger('click');
            return false;
        } 

        const displayPhoto = () => {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("photo-inp").files[0]);
            oFReader.onload = (oFREvent) =>  {
                $('#photo-container').removeClass('d-none');
                document.getElementById("post-image-upload").src = oFREvent.target.result;
            };
        };
     </script>

</body>
</html>