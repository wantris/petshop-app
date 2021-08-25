
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
                        <h3>Register</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end -->

    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 text-center">
                <div class="card shadow mx-auto" style="max-width: 500px;border-radius:20px; border-bottom:3px solid #ef3a15">
                    <div class="card-body">
                        <p class="font-weight-bold text-center">Register Pengguna</p>
                        <form action="{{route('pengguna.auth.postRegister')}}" method="post">
                            @csrf
                            <div class="form-group mt-3">
                                <label class="text-left" style="text-align: left !important" for="">Nama</label>
                                <input type="text" name="name" class="form-control" placeholder="Input Nama">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group mt-3">
                                <label class="text-left" style="text-align: left !important" for="">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Input Username">
                                @if ($errors->has('username'))
                                    <span class="text-danger">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                             <div class="form-group mt-3">
                                <label class="text-left" style="text-align: left !important" for="">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Input Email">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mt-3">
                                <label class="text-left" style="text-align: left !important" for="">Nomor Telepon</label>
                                <input type="text" class="form-control" name="phone" placeholder="Input Nomor Telepon">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Input Password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Konfirmasi Password</label>
                                <input type="password" name="confirm_password" class="form-control" placeholder="Input Konfirmasi Password">
                                @if ($errors->has('confirm_password'))
                                    <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mt-3">
                                <input type="submit" value="Register" class="btn btn-orange" >
                            </div>
                        </form>
                        <p class="mt-3">Sudah punya akun? <a href="{{route('pengguna.auth.login')}}" class="font-weight-bold text-orange">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer_start  -->
    @include('landing._partials.js')
    <!-- footer_end  -->

    <!-- JS here -->
    @include('landing._partials.js')

    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            disableDaysOfWeek: [0, 0],
        //     icons: {
        //      rightIcon: '<span class="fa fa-caret-down"></span>'
        //  }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }

        });
        var timepicker = $('#timepicker').timepicker({
         format: 'HH.MM'
     });
    </script>
</body>
</html>