@extends('layouts.main')

@section('title', 'About Us - ')

@push('style')

@endpush


@section('main')

<div class="boxed blog">

        <!-- page title -->
        <div class="page-title space-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="">
                        <div class=""></div>
                        <div class="banner-title">
                            <div class="page-title-heading">
                                Tentang Kami
                            </div>
                            <div class="page-title-content link-style6">
                                <span><a class="home" href="{{ route('user.home') }}">Beranda</a></span><span class="page-title-content-inner">Tentang Kami</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- /.page-title -->

        <!-- about -->
        <section class="flat-about">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="themesflat-spacer clearfix" data-desktop="117" data-mobile="60" data-smobile="60"></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-post center bd-radius-50-image">
                            <img class="main-post-about"
                                src="{{ asset('images/product/product-square-2.webp') }}" alt="images">
                            <img class="circel-inside" src="{{ asset('images/product/circle-1.webp') }}" alt="images">

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="about-content-title wow fadeInUp">
                                <div class="section-subtitle">TENTANG MAGGOPLAST-GEL</div>
                                <div class="section-title">Pilihan terbaik untuk setiap luka</div>
                                <div class="section-desc">
                                    MaggoPlast-Gel adalah solusi modern dalam perawatan luka yang terbuat dari bahan alami dan organik,
                                    termasuk maggot BSF dan brotowali, yang dikenal karena manfaat penyembuhannya.
                                </div>
                            </div>
                            <div id="about-box" class="about-desc-box">
                                <div class="about-desc">
                                    <div class="about-box-nd1 wow fadeInLeft">
                                        <span class="tf-icon vertical-center"><img src="{{ asset('icon/icon_environment.svg') }}" alt=""></span>
                                        <div class="inner-box">
                                            <a href="">
                                                <h3 class="section-heading-jost-size20 item-1">
                                                    Inovasi Berbasis Lingkungan</h3>
                                            </a>
                                            {{-- <p class="section-desc">Lorem Ipsum is simply</p> --}}
                                        </div>
                                    </div>
                                    <div class="about-box-nd1 wow fadeInLeft">
                                        <span class="tf-icon vertical-center"><img src="{{ asset('icon/icon_bulb.svg') }}" alt=""></span>

                                        <div class="inner-box">
                                            <a href="">
                                                <h3 class="section-heading-jost-size20 item-2">
                                                Solusi Efektif dan Praktis</h3>
                                            </a>
                                            {{-- <p class="section-desc">Lorem Ipsum is simply</p> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="image-desc">
                                    <img class="image" src="{{ asset('images/product/product-square-1.webp')}}" alt="images">
                                </div>
                            </div>
                            <div class="button hover-up">
                                <a href="{{ route('user.product') }}" class="btn2">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-12">
                        <div class="themesflat-spacer clearfix" data-desktop="134" data-mobile="60" data-smobile="60"></div>
                    </div> --}}
                </div>
            </div>
        </section>
        <!-- /about -->



        <!-- Work process -->
        <section class="flat-work-process">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="themesflat-spacer clearfix" data-desktop="90" data-mobile="60" data-smobile="60"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="section-title-box">
                            <h4 class="section-subtitle wow fadeInUp">KOMPOSISI</h4>
                            <h2 class="section-title wow fadeInUp">Komposisi Bahan Maggoplast-gel</h2>
                        </div>
                        <div class="themesflat-spacer clearfix" data-desktop="65" data-mobile="60" data-smobile="60"></div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="features-box wow fadeInUp">
                            <div class="icon-wp-box box-ingredient">
                                <span class="tf-icon-wp "><img src="{{ asset('icon/icon_maggo_oil.svg') }}" class="icon-medium" alt=""></span>

                                <div class="icon-box link-style3">
                                    <span class="section-heading-jost-size20 icon" >01</span>
                                </div>
                            </div>
                            <div class="content-features">
                                    <h3 class="section-heading-jost-size20 text-pri2-color">
                                        Minyak Maggot BSF
                                    </h3>
                                <p class="section-desc">
                                    Minyak ini membantu mempercepat penyembuhan luka dan mencegah infeksi.
                                </p>
                            </div>
                        </div>
                        <div class="features-box wow fadeInUp">
                            <div class="icon-wp-box box-ingredient">
                                <span class="tf-icon-wp "><img src="{{ asset('icon/icon_batang_brotowali.svg') }}" class="icon-medium" alt=""></span>
                                <div class="icon-box link-style3">
                                    <span class="section-heading-jost-size20 icon" >03</span>
                                </div>
                            </div>
                            <div class="content-features cf-3">
                                    <h3 class="section-heading-jost-size20 text-pri2-color">
                                        Ekstrak Batang Brotowali
                                    </h3>
                                <p class="section-desc">
                                    Brotowali meredakan peradangan dan nyeri pada kulit yang terluka.
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="features-box wow fadeInUp">
                            <div class="icon-wp-box box-ingredient">
                                <span class="tf-icon-wp "><img src="{{ asset('icon/icon_nanoemulsi.svg') }}" class="icon-medium" alt=""></span>
                                <div class="icon-box2 link-style3">
                                    <span class="section-heading-jost-size20 icon" >02</span>
                                </div>
                            </div>
                            <div class="content-features cf-2">
                                    <h3 class="section-heading-jost-size20 text-pri2-color">
                                        Basis Nanoemulsi
                                    </h3>
                                <p class="section-desc">
                                    Teknologi nanoemulsi memastikan bahan terserap lebih cepat dan efektif.
                                </p>
                            </div>
                        </div>
                        <div class="features-box wow fadeInUp">
                            <div class="icon-wp-box  box-ingredient">
                                <span class="tf-icon-wp icon-medium"><img src="{{ asset('icon/icon_hydrogel.svg') }}" class="icon-medium" alt=""></span>
                                <div class="icon-box3 link-style3">
                                    <span class="section-heading-jost-size20 icon" >04</span>
                                </div>
                            </div>
                            <div class="content-features cf-4">
                                    <h3 class="section-heading-jost-size20 text-pri2-color">
                                        Basis Hidrogel
                                    </h3>
                                <p class="section-desc">
                                    Hidrogel menjaga kelembapan dan memberikan sensasi dingin pada luka.
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="60" data-smobile="0"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Work process -->

        <!-- counter-->
        <section class="flat-counter">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="themesflat-spacer clearfix" data-desktop="120" data-mobile="60" data-smobile="60"></div>
                    </div>
                    <div class="col-md-9">
                        <div class="counter-content-left wow fadeInLeft">
                            <img class="background-counter" src="{{asset('images/team/tim-1.png')}}" alt="images">
                            <div class="content-left-box" >
                                <h2 class="title-main">Kami adalah tim yang ramah dan berpengalaman.</h2>
                                <p class="section-desc"></p>
                            </div>
                        </div>
                        <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="30" data-smobile="30"></div>
                    </div>
                    <div class="col-md-3">
                        <div class="counter-content-right themesflat-counter wow fadeInRight">
                            <div class="content-right-box mg-bottom30">
                                <span class="title-main white number" data-speed="1000" data-to="9" data-inviewport="yes">9</span><span class="title-main white"></span>
                                <h3 class="section-heading-jost-size20 fw-600">Kemitraan</h3>
                            </div>
                            <div class="content-right-box box-2 mg-bottom30">
                                <span class="title-main white number" data-speed="1500" data-to="200" data-inviewport="yes">200</span><span class="title-main white"></span>
                                <h3 class="section-heading-jost-size20 fw-600">Pembeli</h3>
                            </div>
                            <div class="content-right-box box-3">
                                <span class="title-main white number" data-speed="2000" data-to="75" data-inviewport="yes">75</span><span class="title-main white"></span>
                                <h3 class="section-heading-jost-size20 mg-top-5 fw-600">Testimoni</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="themesflat-spacer clearfix" data-desktop="120" data-mobile="60" data-smobile="60"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /conter -->

        <!-- flat-testimonials-home2 -->
        <section class="flat-testimonials-home2">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="themesflat-spacer clearfix" data-desktop="30" data-mobile="0" data-smobile="0"></div>
                        <div class="testimonials-content-left">
                            <div class="section-title-box">
                                <h5 class="section-subtitle">TESTIMONI PELANGGAN</h5>
                                <h2 class="section-title">Kata mereka </h2>
                            </div>
                            <p class="section-desc mg-top-25">Simak pengalaman dan pendapat dari pelanggan yang telah menggunakan MaggoPlast-Gel.</p>
                        </div>
                        <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="30" data-smobile="30"></div>
                    </div>
                    <div class="col-md-7">
                        <div class="testimonials-content-right wow fadeInRight">
                            <img src="{{asset('images/product/product-square-3.png')}}" alt="images">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="owl-carousel-2 owl-theme author-carousel wow fadeInUp">
                                <div class="item">
                                    <div class="testimonials-author-box bd-radius-8">
                                        <div class="testimonials-author">
                                            <div class="testimonials-author-img">
                                                <img src="{{asset('images/testimoni/testimoni-2.png')}}" class="bd-radius-50" alt="images">
                                            </div>
                                            <div class="testimonials-author-text">
                                                <h4 class="section-desc-heading">Intan Naresya</h4>
                                                <h5 class="section-desc"> Mahasiswi </h5>
                                            </div>
                                        </div>
                                        <div class="testimonials-text section-desc mg-top-25">
                                            <p>
                                                Produknya sangat inovatif, sangat
                                                cocok digunakan walaupun sedang
                                                beraktivitas karena plasternya
                                                berbentuk gel dan bening sehingga
                                                mudah diaplikasikan serta tidak
                                                mengganggu penampilan.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimonials-author-box box-2 bd-radius-8">
                                        <div class="testimonials-author">
                                            <div class="testimonials-author-img">
                                                <img src="{{asset('images/testimoni/testimoni-1.png')}}" class="bd-radius-50" alt="images">
                                            </div>
                                            <div class="testimonials-author-text">
                                                <h4 class="section-desc-heading">Dessifa</h4>
                                                <h5 class="section-desc">Mahasiswi</h5>
                                            </div>
                                        </div>
                                        <div class="testimonials-text section-desc mg-top-25">
                                            <p>
                                                Udah order kedua kali soalnya yang
                                                pertama udah habis dan sangat
                                                bermanfaat, cocok banget buat yang
                                                sering terluka ringan karena produk
                                                plester ini tuh bikin luka cepet
                                                sembuh, sukses terus min.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="testimonials-author-box box-2 bd-radius-8">
                                        <div class="testimonials-author">
                                            <div class="testimonials-author-img">
                                                <img src="{{asset('images/testimoni/testimoni-3.png')}}" class="bd-radius-50" alt="images">
                                            </div>
                                            <div class="testimonials-author-text">
                                                <h4 class="section-desc-heading">Amanda Tsa Tsa</h4>
                                                <h5 class="section-desc">Mahasiswi</h5>
                                            </div>
                                        </div>
                                        <div class="testimonials-text section-desc mg-top-25">
                                            <p>
                                                Baru pertama kali pakai produk plester
                                                yang bentuknya gel bener-bener
                                                inovatif, luka gores aku jadi cepet
                                                sembuh hehe. Nanti kalo abis gass
                                                beli lagii
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="themesflat-spacer clearfix" data-desktop="119" data-mobile="60" data-smobile="60"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- flat-testimonials-home2 -->

    </div>

@endsection


@push('scripts')

@endpush
