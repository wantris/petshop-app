
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
                <div class="col-12 grid-margin mt-3" >
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
                                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center active">
                                    <i class="far fa-user mr-2"></i>
                                    <a class="pt-1px d-none d-md-block"  href="#">Profil</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row profile-body"  >
                <div class="col-12">
                    <div class="card shadow-card" style="border-radius: 20px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8 col-12 px-5">
                                    <p class="h4 text-orange mb-4 font-weight-bold">Profil</p>
                                    <hr>
                                    <form action="{{route('pengguna.account.profile.save', $pengguna->username)}}" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Nama</label>
                                            <input type="text" name="name" value="{{$pengguna->name}}" id="" class="form-control">
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <input type="text" disabled id="" value="{{$pengguna->username}}" class="form-control">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" name="email" id="" value="{{$pengguna->email}}" class="form-control">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nomor Telepon</label>
                                            <input type="text" name="phone" id="" value="{{$pengguna->phone}}" class="form-control">
                                            @if ($errors->has('phone'))
                                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <input type="text" name="address" id="" value="{{$pengguna->address}}" class="form-control">
                                            @if ($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="">Deskripsi</label>
                                            <textarea name="description" class="form-control" id="" cols="30" rows="10">{{$pengguna->description}}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="">Photo</label>
                                            <input type="hidden" name="old_photo" value="{{$pengguna->photo}}">
                                            <input type="file" name="photo" id="photo-inp" onchange="displayPhoto()" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Submit" style="font-size:13px " class="btn btn-orange btn-block mt-3" >
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-4 col-12 pt-3">
                                    @if ($pengguna->photo)
                                        <img class="profile-pic rounded-circle img-fluid" id="post-image-upload" style="max-width: 200px" src="{{asset('asset-landing/photo-profil/'.$pengguna->photo)}}" alt="profile">
                                    @else
                                        <img class="profile-pic rounded-circle img-fluid" id="post-image-upload" style="max-width: 200px" src="{{asset('asset-landing/pengguna_icon2.png')}}" alt="profile">
                                    @endif
                                </div>
                            </div>
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

        const displayPhoto = () => {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("photo-inp").files[0]);
            oFReader.onload = (oFREvent) =>  {
                document.getElementById("post-image-upload").src = oFREvent.target.result;
                document.getElementById("post-image-avatar").src = oFREvent.target.result;
            };
        };
    </script>
</body>
</html>