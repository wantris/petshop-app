
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
                                <li class="header-link-item d-flex align-items-center ">
                                    <i class="fas fa-stream mr-2"></i>
                                    <a class="pt-1px d-none d-md-block" href="{{route('pengguna.account.index', $pengguna->username)}}" >Lini Masa</a>
                                </li>
                                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center ">
                                    <i class="far fa-user mr-2"></i>
                                    <a class="pt-1px d-none d-md-block" href="{{route('pengguna.account.profile', $pengguna->username)}}">Profil</a>
                                </li>
                                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center active">
                                    <i class="fas fa-cat mr-2"></i>
                                    <a class="pt-1px d-none d-md-block" href="{{route('pengguna.adopt.index')}}">Adopsi</a>
                                </li>
                                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                                    <i class="fas fa-user-shield mr-2"></i>
                                    <a class="pt-1px d-none d-md-block" href="{{route('pengguna.animalsave.index')}}">Penyelamatan Hewan</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row profile-body mb-4">
                <div class="col-12 mb-2">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                  <a class="nav-link " href="{{route('pengguna.adopt.index')}}">Daftar Adopsi</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link active" href="{{route('pengguna.adopt.submission.index')}}">Pengajuan Adopsi Saya</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @foreach ($posts as $post)
                    <div class="col-lg-4">
                        <div class="card shadow" style="border-radius: 20px; min-height:400px">
                            <div class="card-body">
                                <div class="mb-2">
                                    @if ($post->photo)
                                        <img class="w-100" src="{{asset('assets/photo-post/'.$post->photo)}}" style="max-height: 250px">
                                    @endif
                                </div>
                                <div class="mb-2">
                                    <p >{{$post->content}}</p>
                                </div>
                                <div class="mb-4 text-center">
                                    @foreach ($post->adoptRef->formRef as $submission)
                                        @if ($submission->adopter_id == Session::get('id_pengguna') && $submission->checked == 1)
                                                @if($post->adoptRef->is_validated_owner == 1 && !$post->adoptRef->is_validated_admin)
                                                    <button type="button" class="btn btn-success btn-block" onclick="Jemput({{$post->adoptRef->id}})" data-toggle="tooltip" data-placement="bottom" title="Jemput hewan">
                                                        <i class="fas fa-caret-square-up"></i>
                                                    </button>
                                                @elseif($post->adoptRef->is_validated_owner == 2 && !$post->adoptRef->is_validated_admin)
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" data-placement="bottom" title="Sedang menjemput hewan">
                                                        <i class="fas fa-car"></i>
                                                    </button>
                                                @elseif($post->adoptRef->is_validated_owner == 3 && !$post->adoptRef->is_validated_admin)
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" data-placement="bottom" title="Menunggu valdiasi admin">
                                                        <i class="fas fa-user-shield"></i>
                                                    </button>
                                                @elseif($post->adoptRef->is_validated_owner == 3 && $post->adoptRef->is_validated_admin)
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" data-placement="bottom" title="Menunggu valdiasi admin">
                                                        <i class="far fa-check-circle"></i>
                                                    </button>
                                                @endif
                                        @elseif($submission->adopter_id == Session::get('id_pengguna') && $submission->checked == 0)
                                            <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" data-placement="bottom" title="Belum terpilih menjadi pengadopsi">
                                                <i class="far fa-frown-open"></i>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="text-secondary">
                                    <small><i class="far fa-user mr-2"></i>{{$post->userRef->name}}</small>
                                </div>
                            </div>
                            <div class="card-footer bg-primary text-center" style="border-bottom-left-radius: 20px;border-bottom-right-radius: 20px">
                                <span class="text-white" data-toggle="tooltip" data-placement="bottom" title="Kode Hewan Adopsi">{{$post->adoptRef->code}}</span>
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

        const Jemput = (adopt_id) => {
            event.preventDefault();
            let url = "/account/adopt/list/submission/jemput";
            let msg = "Apakah anda yakin ingin menjemput hewan?";

            Notiflix.Confirm.Show( 
                'Adopsi',
                msg,
                'Yes',
                'No',
                function(){ 
                    $.ajax(
                        {
                            url: url,
                            type: 'post', 
                            dataType: "JSON",
                            data: {
                                "adopt_id": adopt_id ,
                                'status': 2
                            },
                            success: function (response){
                                if(response.status == 1){
                                    Notiflix.Notify.Success(response.message);
                                    location.reload();
                                }
                            },
                            error: function(xhr) {
                                console.log(xhr);
                                Notiflix.Notify.Failure('Ooopss');
                            }
                    });
                }, function(){
                    // No button callback alert('If you say so...'); 
                } ); 
            }
    </script>


</body>
</html>