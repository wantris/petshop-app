
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
            <div class="row profile-body">
                <div class="col-12 mt-3">
                    <a href="{{route('pengguna.adopt.index')}}" class="float-right btn btn-primary">Kembali</a>
                </div>
                <div class="col-12 mt-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <table id="submission-table" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Calon Pengadopsi</th>
                                        <th>Nomor Telepon</th>
                                        <th>Nomor Whatsapp</th>
                                        <th>Terpilih</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($adopt->formRef as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->userRef->name}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>{{$item->whatsapp_number}}</td>
                                            <td>@if ($item->checked == 1)
                                                    <i class="fas fa-check-circle"></i>
                                                @else
                                                    <i class="fas fa-ban"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    @php
                                                        $json_item = json_encode($item);
                                                    @endphp
                                                    <button type="button" onclick="seeDetail({{$json_item}})" class="btn btn-success mr-2" data-toggle="modal" data-target="#detailModal">
                                                        Detail
                                                    </button>
                                                    <form action="{{route('pengguna.adopt.index.submission.accept')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="submission_id" value="{{$item->id}}">
                                                        <button type="submit" class="btn btn-primary" >
                                                            Pilih
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Pengajuan Adopsi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" disabled id="name-text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Umur</label>
                        <input type="text" disabled id="age-text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Telepon</label>
                        <input type="text" disabled id="phone-text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nomor WhatsApp</label>
                        <input type="text" disabled id="wa-text" class="form-control">
                        <small class="text-primary font-weight-bold"><a href="#" target="_blank" id="link-wa-text"></a></small>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" disabled id="email-text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <div class="mt-2" id="alamat-text">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
        $(document).ready(function() {
            $('#submission-table').DataTable();
        });

        const seeDetail = (item) =>{
            event.preventDefault();
            let link = `https://wa.me/${item.whatsapp_number}?text=Apakah anda yakin ingi mengadopsi hewan peliharaan saya?`;

            $('#name-text').val(item.user_ref.name);
            $('#age-text').val(item.age+" Tahun");
            $('#phone-text').val(item.phone);
            $('#wa-text').val(item.whatsapp_number);
            $('#link-wa-text').text("Chat langsung");
            $("#link-wa-text").attr("href", link)
            $('#email-text').val(item.email);
            $('#alamat-text').text(item.address);
        }
    </script>

</body>
</html>