
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Formulir Adopsi</title>
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
                        <h3>Formulir Adopsi</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end -->

    <div class="container mt-5 mb-5">
        <div class="row px-5">
            <div class="col-md-6 o offset-md-3 white-bg pad-4">
                <div class="card shadow-sm" style="border-radius:20px">
                    <div class="card-body">
                        <form action="{{route('pengguna.adopt.form.save')}}" method="post">
                            @csrf
                            @method('post')
                            <input type="hidden" name="adopt_id" value="{{$adopt_id}}">
                            <div class="form-group">
                                <label for="" class="text-dark">Nama Lengkap</label>
                                <input type="text" disabled placeholder="Input Nama Lengkap" value="{{$user->name}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="text-dark">Umur</label>
                                <input type="number" placeholder="Input umur" name="age" value="{{old('age')}}" class="form-control">
                                @if ($errors->has('age'))
                                    <span class="text-danger">{{ $errors->first('age') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="" class="text-dark">Nomor Telepon</label>
                                <input type="text" name="phone_number" placeholder="Input Nomor Telepon" value="{{old('phone_number')}}" class="form-control">
                                @if ($errors->has('phone_number'))
                                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="" class="text-dark">Nomor Whatsap</label>
                                <input type="text" name="wa_number" placeholder="Input Nomor Whatsap" value="{{old('wa_number')}}" class="form-control">
                                @if ($errors->has('wa_number'))
                                    <span class="text-danger">{{ $errors->first('wa_number') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="" class="text-dark">Email</label>
                                <input type="text" name="email" placeholder="Input Email" value="{{old('email')}}" class="form-control">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="" class="text-dark">Alamat</label>
                                <textarea name="address" class="form-control">{{old('address')}}</textarea>
                                @if ($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn btn-orange btn-block">
                            </div>
                        </form>
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



</body>
</html>