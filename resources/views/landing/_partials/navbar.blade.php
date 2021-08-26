<header>
    <div class="header-area ">
        <div class="header-top_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-8">
                        <div class="short_contact_list">
                            <ul>
                                <li><a href="#">+880 4664 216</a></li>
                                <li><a href="#">Mon - Sat 10:00 - 7:00</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 ">
                        <div class="social_media_links">
                            <a href="#">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-pinterest-p"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-google-plus"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sticky-header" class="main-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-3">
                        <div class="logo">
                            <a href="index.html" class="font-weight-bold text-dark" style="text-decoration: none">
                                SIPETSHOP
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9">
                        <div class="main-menu  d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a  href="index.html">Home</a></li>
                                    <li><a  href="{{route('pengguna.linimasa.index')}}">Lini Masa</a></li>
                                    <li><a href="{{route('pengguna.information.index')}}">Informasi Hewan</a></li>
                                    <li><a href="about.html">Tentang</a></li>
                                    <li><a href="contact.html">Kontak</a></li>
                                    @if (Session::get('is_pengguna'))
                                        <li>
                                            <div class="dropdown show">
                                                <a class="dropdown-toggle" href="#" role="button" id="navbar-menu-login"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <img src="{{asset('asset-landing/pengguna_icon2.png')}}" class="d-inline mr-1" style="width: 30px; height:30px; border-radius:20px" alt="">
                                                    <i class="icofont-rounded-down d-inline mt-2 text-secondary" id="arrow-icon"></i>
                                                </a>
                                                <div class="dropdown-menu mr-4" aria-labelledby="navbar-menu-login">
                                                    @php
                                                        $pengguna = \App\User::find(Session::get('id_pengguna'));
                                                    @endphp
                                                    <a class="dropdown-item text-center px-2 py-2" href="{{route('pengguna.account.index', $pengguna->username)}}">{{$pengguna->name}}</a>
                                                    <a class="dropdown-item text-center px-2 py-2" href="">Ganti
                                                        Password</a>
                                                    <a class="dropdown-item text-center px-2 py-2" href="{{route('pengguna.auth.logout')}}">Sign out</a>
                                                </div>
                                            </div>
                                        </li>
                                    @else
                                        <li><a href="{{route('pengguna.auth.login')}}">Login</a></li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>