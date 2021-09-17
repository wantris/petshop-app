
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SIPETCARE</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('landing._partials.css')
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    {{-- Navbar --}}
    @include('landing._partials.navbar')

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider slider_bg_1 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="slider_text">
                            <h3>SIPETCARE</h3>
                            <p>Shipetshop adalah portal website yang berisikan informasi mengenai pet shop dan dokter hewan</p>
                            <a href="contact.html" class="boxed-btn4">Kontak Kami</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dog_thumb d-none d-lg-block">
                <img src="{{asset('asset-landing/img/banner/cat.png')}}" style="max-height: 800px" alt="">
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- service_area_start  -->
    <div class="service_area">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-7 col-md-10">
                    <div class="section_title text-center mb-95">
                        <h3>Fitur SIPETCARE</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="single_service">
                         <div class="service_thumb service_icon_bg_1 d-flex align-items-center justify-content-center">
                             <div class="service_icon">
                                <img src="{{asset('asset-landing/icon/pet-shop.png')}}" alt="">
                             </div>
                         </div>
                         <div class="service_content text-center">
                            <h3>Informasi Pet Shop</h3>
                            <p>Informasi pet shop yang sedang populer dan banyak diminati</p>
                         </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_service active">
                         <div class="service_thumb service_icon_bg_1 d-flex align-items-center justify-content-center">
                             <div class="service_icon">
                                 <img src="{{asset('asset-landing/icon/veterinarian.png')}}" alt="">
                             </div>
                         </div>
                         <div class="service_content text-center">
                            <h3>Informasi Dokter Hewan</h3>
                            <p>Informasi dokter hewan yang berguna apabila hewan perliharaan anda mengalamai sakit</p>
                         </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_service">
                         <div class="service_thumb service_icon_bg_1 d-flex align-items-center justify-content-center">
                             <div class="service_icon">
                                <img src="{{asset('asset-landing/icon/news-feed.png')}}" alt="">
                             </div>
                         </div>
                         <div class="service_content text-center">
                            <h3>Pet Feed</h3>
                            <p>Pet Feed adalah feed dari adopter yang memberikan pengalamannya tentang memelihara hewan</p>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service_area_end -->

    <!-- pet_care_area_start  -->
    <div class="pet_care_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6">
                    <div class="pet_thumb">
                        <img src="{{asset('asset-landing/img/about/pet_care.png')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1 col-md-6">
                    <div class="pet_info">
                        <div class="section_title">
                            <h3>Kami peduli dengan hewan peliharaan anda</h3>
                            <p>Hewan merupakan makhluk hidup yang wajib kita sayangi seperti hal nya dengan makhluk hidup lain sehingga kami membangun <span class="font-weight-bold">SIPETCARE</span> </p>
                            <a href="about.html" class="boxed-btn3">About Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- pet_care_area_end  -->

    <!-- adapt_area_start  -->
    <div class="adapt_area">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5">
                    <div class="adapt_help">
                        <div class="section_title">
                            <h3><span>Kami Butuh Anda</span>
                                Untuk Mengadopsi Hewan</h3>
                            <p>Bantuan anda dalam mengadopsi hewan akan akan sangat membantu sekali</p>
                            <a href="contact.html" class="boxed-btn3">Kontak Kami</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="adapt_about">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="single_adapt text-center">
                                    <img src="{{asset('asset-landing/img/adapt_icon/1.png')}}" alt="">
                                    <div class="adapt_content">
                                        <h3 class="counter">{{$info_count}}</h3>
                                        <p>Artikel</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="single_adapt text-center">
                                    <img src="{{asset('asset-landing/img/adapt_icon/3.png')}}" alt="">
                                    <div class="adapt_content">
                                        <h3><span class="counter">{{$feed_count}}</span>+</h3>
                                        <p>Feed</p>
                                    </div>
                                </div>
                                <div class="single_adapt text-center">
                                    <img src="{{asset('asset-landing/img/adapt_icon/2.png')}}" alt="">
                                    <div class="adapt_content">
                                        <h3><span class="counter">{{$user_count}}</span>+</h3>
                                        <p>Pengguna Aktif</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- adapt_area_end  -->



    <div class="contact_anipat anipat_bg_1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact_text text-center">
                        <div class="section_title text-center">
                            <h3>Kenapa harus ke SIPETCARE?</h3>
                            <p>Karena kita tahu bahwa bahkan teknologi terbaik pun hanya sebaik orang-orang di belakangnya. Dukungan teknis 24/7.</p>
                        </div>
                        <div class="contact_btn d-flex align-items-center justify-content-center">
                            <a href="contact.html" class="boxed-btn4">Chat Kami</a>
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

</body>

</html>