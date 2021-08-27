
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

    <link rel="stylesheet" href="{{asset('asset-landing/css/profile.css')}}">
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header_start  -->
        @include('landing._partials.navbar')
    <!-- header_start  -->


    <div class="container">
        <div class="profile-page tx-13">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="profile-header">
                        <div class="cover">
                            <div class="gray-shade"></div>
                            <figure>
                                <img src="https://bootdey.com/img/Content/bg1.jpg" style="max-height:200px" class="img-fluid" alt="profile cover">
                            </figure>
                            <div class="cover-body d-flex justify-content-between align-items-center">
                                <div>
                                    @if ($pengguna->photo)
                                        <img class="profile-pic" id="post-image-avatar" src="{{asset('asset-landing/photo-profil/'.$pengguna->photo)}}" alt="profile">
                                    @else
                                        <img class="profile-pic" id="post-image-avatar" src="{{asset('asset-landing/pengguna_icon2.png')}}" alt="profile">
                                    @endif
                                    <span class="profile-name">{{$pengguna->name}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="header-links">
                            <ul class="links d-flex  mt-3 mt-md-0">
                                <li class="header-link-item d-flex align-items-center active">
                                    <i class="fas fa-stream mr-2"></i>
                                    <a class="pt-1px d-none d-md-block" href="#" >Lini Masa</a>
                                </li>
                                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                                    <i class="far fa-user mr-2"></i>
                                    <a class="pt-1px d-none d-md-block" href="{{route('pengguna.account.profile', $pengguna->username)}}">Profil</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row profile-body">
                <!-- left wrapper start -->
                <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
                    <div class="card rounded">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="card-title mb-0">Tentang</h6>
                            </div>
                            <p>{{$pengguna->description}}</p>
                            <div class="mt-3">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase">Bergabung:</label>
                                <p class="text-muted">{{$pengguna->created_at->isoFormat('d MMM YYYY')}}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase">Alamat:</label>
                                <p class="text-muted">{{$pengguna->address}}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase">Email:</label>
                                <p class="text-muted">{{$pengguna->email}}</p>
                            </div>
                            <div class="mt-3 d-flex social-links">
                                <a href="javascript:;" class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon github">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github" data-toggle="tooltip" title="" data-original-title="github.com/nobleui">
                                        <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                    </svg>
                                </a>
                                <a href="javascript:;" class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon twitter">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter" data-toggle="tooltip" title="" data-original-title="twitter.com/nobleui">
                                        <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                    </svg>
                                </a>
                                <a href="javascript:;" class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon instagram">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram" data-toggle="tooltip" title="" data-original-title="instagram.com/nobleui">
                                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- left wrapper end -->
                <!-- middle wrapper start -->
                <div class="col-md-8 col-xl-6 middle-wrapper">
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
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-lg-12 grid-margin">
                                <div class="card rounded">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                @if ($pengguna->photo)
                                                    <img class="img-xs rounded-circle" src="{{asset('asset-landing/photo-profil/'.$pengguna->photo)}}" alt="">
                                                @else
                                                    <img class="img-xs rounded-circle" src="{{asset('asset-landing/pengguna_icon2.png')}}" alt="">
                                                @endif
                                                <div class="ml-2 mt-3">
                                                    <p style="margin-bottom: -10% !important;">{{$post->userRef->name}}</p>
                                                    <p class="tx-11 text-muted text-secondary" style="font-size: 13px">{{$post->created_at->isoFormat('d MMM YYYY')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="mb-3 tx-14">{{$post->content}}</p>
                                        @if ($post->photo)
                                            <img class="img-fluid" src="{{asset('assets/photo-post/'.$post->photo)}}" alt="">
                                        @endif
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex post-actions" style="font-size: 13px !important">
                                            <a href="javascript:;" class="d-flex align-items-center text-muted mr-4">
                                                <i class="far fa-thumbs-up"></i>
                                                <p class="d-none d-md-block ml-2 mt-2">Like</p>
                                            </a>
                                            <a data-toggle="collapse" href="#comment-container-{{$post->id}}" role="button" aria-expanded="false" aria-controls="comment-container-collapse" class="d-flex align-items-center text-muted mr-4">
                                                <i class="far fa-comments"></i>
                                                <p class="d-none d-md-block ml-2 mt-2">Comment</p>
                                            </a>
                                            <a href="javascript:;" class="d-flex align-items-center text-muted">
                                                <i class="fa fa-share"></i>
                                                <p class="d-none d-md-block ml-2 mt-2">Share</p>
                                            </a>
                                        </div>
                                        <div class="collapse" id="comment-container-{{$post->id}}">
                                            <form action="{{route('pengguna.account.post.comment.save')}}" method="post">
                                                @csrf
                                                <div class="p-2">
                                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                                    <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40"><textarea class="form-control ml-1 shadow-none textarea" name="comment"></textarea></div>
                                                    <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" type="submit">Post comment</button><button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Cancel</button></div>
                                                </div>
                                            </form>
                                            <div class="media mb-5 mt-4">
                                                @if ($post->commentRef->count() > 0)
                                                    @foreach ($post->commentRef as $comment)
                                                        @if (!$comment->parent_id)
                                                            @if ($pengguna->photo)
                                                                <img class="mr-3 rounded-circle" alt="Bootstrap Media Preview" src="{{asset('asset-landing/photo-profil/'.$pengguna->photo)}}" />
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
                                                                                @if ($pengguna->photo)
                                                                                    <img class="rounded-circle" alt="Bootstrap Media Another Preview" src="{{asset('asset-landing/photo-profil/'.$pengguna->photo)}}" />
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
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- middle wrapper end -->
                <div class="d-none d-xl-block col-xl-3 right-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <select name="" id="" class="form-control mt-3">
                                <option >Semua Status</option>
                                <option value="1">Tervalidasi</option>
                                <option value="0">Tidak Tervalidasi</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>



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