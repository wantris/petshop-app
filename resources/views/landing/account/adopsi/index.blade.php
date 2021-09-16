
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Adopsi Saya</title>
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
                                <li class="header-link-item d-flex align-items-center">
                                    <i class="fas fa-stream mr-2"></i>
                                    <a class="pt-1px d-none d-md-block" href="#" >Lini Masa</a>
                                </li>
                                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center ">
                                    <i class="far fa-user mr-2"></i>
                                    <a class="pt-1px d-none d-md-block" href="{{route('pengguna.account.profile', $pengguna->username)}}">Profil</a>
                                </li>
                                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center active">
                                    <i class="fas fa-cat mr-2"></i>
                                    <a class="pt-1px d-none d-md-block" href="{{route('pengguna.account.profile', $pengguna->username)}}">Adopsi</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row profile-body">
                <div class="col-12 mb-2">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                  <a class="nav-link active" href="#">Daftar Adopsi</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="{{route('pengguna.adopt.submission.index')}}">Pengajuan Adopsi Saya</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @foreach ($posts as $post)
                    <div class="col-lg-4">
                        <div class="card shadow" style="border-radius: 20px">
                            <div class="card-body">
                                <div class="mb-2">
                                    @if ($post->photo)
                                        <img class="img-fluid" src="{{asset('assets/photo-post/'.$post->photo)}}">
                                    @endif
                                </div>
                                <div class="mb-2">
                                    <p class="comment-text">{{$post->content}}</p>
                                </div>
                                <div class="mb-2 d-flex text-center">
                                    @if (!$post->adoptRef->is_validated_owner && !$post->adoptRef->is_validated_admin)
                                        <button type="button" class="btn btn-success mr-2" data-toggle="tooltip" data-placement="bottom" title="Menunggu pengadopsi">
                                            <i class="far fa-clock"></i>
                                        </button>
                                    @elseif($post->adoptRef->is_validated_owner && !$post->adoptRef->is_validated_admin)
                                        <button type="button" class="btn btn-success mr-2" data-toggle="tooltip" data-placement="bottom" title="Menunggu validasi admin">
                                            <i class="fas fa-user-shield"></i>
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-success mr-2" data-toggle="tooltip" data-placement="bottom" title="Sudah teradopsi">
                                            <i class="far fa-check-circle"></i>
                                        </button>
                                    @endif
                                    
                                    <a href="{{route('pengguna.adopt.index.submission.list',['adoptid' => $post->adoptRef->id])}}" data-toggle="tooltip" data-placement="bottom" title="Daftar Pengajuan Adopsi" class="btn btn-primary mr-2"><i class="fas fa-clipboard-list"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>


</body>
</html>