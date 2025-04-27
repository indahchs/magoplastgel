@extends('layouts.main')

@section('title', '')

@push('style')

@endpush

@section('main')

    <!-- page title -->
    <div class="page-title-home1">
        <div class="container-fluid">
            <div class="row">
                <div class="inner-title-home1">
                    <!-- /.page-title -->
                    <div class="flat-slider clearfix">
                        <div class="rev_slider_wrapper fullwidthbanner-container">
                            <div id="rev-slider2" class="rev_slider fullwidthabanner">
                                <ul>
                                    <!-- Slide 1 -->
                                    <li data-transition="random">
                                        <!-- Main Image -->
                                        <!-- Layers -->
                                        <div class="tp-caption tp-resizeme text-one"
                                            data-x="['left','left','left','center']"
                                            data-hoffset="['0','0','0','0']"
                                            data-y="['middle','middle','middle','middle']"
                                            data-voffset="['-274','-50','-50','-50']"
                                            data-fontsize="['16','16','16','16']" data-lineheight="['20','0','0','0']"
                                            data-width="full" data-height="none" data-whitespace="normal"
                                            data-transform_idle="o:1;"
                                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                            data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;"
                                            data-start="700" data-splitin="none" data-splitout="none"
                                            data-responsive_offset="on">
                                            <h3 class="sub-title">MAGGOPLAST-GEL</h3>
                                        </div>

                                        <div class="tp-caption tp-resizeme text-two"
                                            data-x="['left','left','left','center']" data-hoffset="['-2','-2','5','0']"
                                            data-y="['middle','middle','middle','middle']" data-voffset="['-130','-165', '-15','-15']"
                                            data-fontsize="['60','70','50','60']"
                                            data-lineheight="['70','80','64','48']"
                                            data-width="full"
                                            data-height="none"
                                            data-whitespace="normal"
                                            data-transform_idle="o:1;"
                                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                            data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;"
                                            data-start="700" data-splitin="none" data-splitout="none"
                                            data-responsive_offset="on">
                                            <div class="title-box">
                                                <h2 class="title-slider text-pri2-color">Plaster Herbal sebagai <br>
                                                    Solusi Perlindungan <br>Lukamu<br></h2>
                                            </div>
                                        </div>

                                        <div class="tp-caption btn-text btn-linear hv-linear-gradient"
                                            data-x="['left','left','left','center']"
                                            data-hoffset="['-3','-3','5','0']"
                                            data-y="['middle','middle','middle','middle']"
                                            data-voffset="['48','40','180','280']" data-width="full"
                                            data-height="none" data-whitespace="normal" data-transform_idle="o:1;"
                                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                            data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;"
                                            data-start="700" data-splitin="none" data-splitout="none"
                                            data-responsive_offset="on">
                                            <div class="button-box">
                                                <div class="button res-btn-slider">
                                                    <a href="{{ route('user.product') }}" class="btn btn-left">Beli Sekarang</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tp-caption tp-resizeme image-slider text-right "
                                            data-x="['right','right','right','right']"
                                            data-hoffset="['-29','-29','-150','-29']"
                                            data-y="['center','center','center','center']"
                                            data-voffset="['-88','-88','60','-88']" data-width="full"
                                            data-height="none" data-whitespace="normal" data-transform_idle="o:1;"
                                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                            data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;"
                                            data-start="800" data-splitin="none" data-splitout="none"
                                            data-responsive_offset="on">
                                            <img class="img-slide wow jackInTheBox" data-wow-delay="2500ms"
                                                data-wow-duration="3s"
                                                src="{{ asset('images/hero/hero-1.png') }}"
                                                alt="images">
                                        </div>
                                    </li>
                                    <!-- /End Slide 1 -->
                                    <!-- Slide 1 -->
                                    <li data-transition="random">
                                        <!-- Main Image -->
                                        <!-- Layers -->
                                        <div class="tp-caption tp-resizeme text-one"
                                            data-x="['left','left','left','center']"
                                            data-hoffset="['0','0','0','0']"
                                            data-y="['middle','middle','middle','middle']"
                                            data-voffset="['-274','-50','-50','-50']"
                                            data-fontsize="['16','0','0','0']" data-lineheight="['20','0','0','0']"
                                            data-width="full" data-height="none" data-whitespace="normal"
                                            data-transform_idle="o:1;"
                                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                            data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;"
                                            data-start="700" data-splitin="none" data-splitout="none"
                                            data-responsive_offset="on">
                                            <h3 class="sub-title">MAGGOPLAST-GEL</h3>
                                        </div>

                                        <div class="tp-caption tp-resizeme text-two"
                                            data-x="['left','left','left','center']"
                                            data-hoffset="['-2','-2','5','0']"
                                            data-y="['middle','middle','middle','middle']"
                                            data-voffset="['-130','-165',10','-15']"
                                            data-fontsize="['60','70','50','60']"
                                            data-lineheight="['70','80','64','48']" data-width="full"
                                            data-height="none" data-whitespace="normal" data-transform_idle="o:1;"
                                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                            data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;"
                                            data-start="700" data-splitin="none" data-splitout="none"
                                            data-responsive_offset="on">
                                            <div class="title-box">
                                                <h2 class="title-slider text-pri2-color">Plaster Liquid
                                                    <br> Pertama di Indonesia
                                                </h2>
                                            </div>
                                        </div>

                                        <div class="tp-caption btn-text btn-linear hv-linear-gradient"
                                            data-x="['left','left','left','center']"
                                            data-hoffset="['-3','-3','5','0']"
                                            data-y="['middle','middle','middle','middle']"
                                            data-voffset="['48','40','180','300']" data-width="full"
                                            data-height="none" data-whitespace="normal" data-transform_idle="o:1;"
                                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                            data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;"
                                            data-start="700" data-splitin="none" data-splitout="none"
                                            data-responsive_offset="on">
                                            <div class="button-box">
                                                <div class="button res-btn-slider">
                                                    <a href="{{ route('user.product') }}" class="btn btn-left">Beli Sekarang</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tp-caption tp-resizeme image-slider text-right "
                                            data-x="['right','right','right','right']"
                                            data-hoffset="['-29','-29','-150','-29']"
                                            data-y="['center','center','center','center']"
                                            data-voffset="['-88','-88','60','-88']" data-width="full"
                                            data-height="none" data-whitespace="normal" data-transform_idle="o:1;"
                                            data-transform_in="y:0;z:[100%];rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                            data-mask_in="x:[100%];y:0px;" data-mask_out="x:inherit;y:inherit;"
                                            data-start="900" data-splitin="none" data-splitout="none"
                                            data-responsive_offset="on">
                                            <img class="img-slide wow jackInTheBox" data-wow-delay="2500ms"
                                                data-wow-duration="3s"
                                                src="{{ asset('images/hero/hero-1.png') }}"
                                                alt="images">
                                        </div>
                                    </li>
                                    <!-- /End Slide 1 -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- flat-slider -->
                </div>

            </div>

        </div>
    </div>
    <!-- /.page-title -->

    <!-- features -->
    <section class="flat-features">
        <div class="container-fluid">
            <div class="row">
                <div class="item-four-column">
                    <div class="inner-features hover-up wow fadeInUp">
                        <div class="features-box">
                            {{-- <span class="tf-icon icon-farming"></span> --}}
                            <div class="content-features">
                                <a href="">
                                    <h3 class="section-heading-rubik-size20">
                                        Percepatan Penyembuhan Luka
                                    </h3>
                                </a>
                                <p class="section-desc">
                                    Mempercepat penyembuhan luka dan mencegah infeksi dengan sifat
                                    anti-inflamasi serta antimikroba.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" item-four-column">
                    <div class="inner-features hover-up wow fadeInUp">
                        <div class="features-box">
                            {{-- <span class="tf-icon icon-hand-gloves"></span> --}}
                            <div class="content-features">
                                <a href="">
                                    <h3 class="section-heading-rubik-size20">
                                        Fleksibilitas dan Kenyamanan
                                    </h3>
                                </a>
                                <p class="section-desc">
                                    Mudah diaplikasikan, memberikan sensasi dingin, tidak lengket, tahan air, dan nyaman di kulit.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" item-four-column">
                    <div class="inner-features hover-up wow fadeInUp">
                        <div class="features-box">
                            {{-- <span class="tf-icon icon-fruit-box"></span> --}}
                            <div class="content-features">
                                <a href="">
                                    <h3 class="section-heading-rubik-size20">
                                        Ramah Lingkungan
                                    </h3>
                                </a>
                                <p class="section-desc">
                                    Menggunakan bahan-bahan organik yang mudah terurai,
                                    Maggoplast-gel mengurangi limbah plastik dan ramah lingkungan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" item-four-column">
                    <div class="inner-features hover-up wow fadeInUp">
                        <div class="features-box">
                            {{-- <span class="tf-icon icon-seed"></span> --}}
                            <div class="content-features">
                                <a href="">
                                    <h3 class="section-heading-rubik-size20">
                                        Kemasan dengan Aplikator Pump
                                    </h3>
                                </a>
                                <p class="section-desc">
                                    Memudahkan penggunaan secara higienis tanpa perlu kontak langsung dengan luka​.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /features -->

    <!-- about -->
    <section class="flat-about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="121" data-mobile="60" data-smobile="60">
                    </div>
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
            </div>
        </div>
    </section>
    <!-- /about -->

    <!-- Our services -->
    <section class="flat-services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-box">
                        <h4 class="section-subtitle">KENAPA MAGGOPLAST-GEL</h4>
                        <h2 class="section-title">Yang Maggoplast-gel Berikan<br> </h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="67" data-mobile="60" data-smobile="60">
                    </div>
                </div>

                <div class="item-four-column">
                    <div class="our-services-box hover-up-style2 mg-bottom30 wow fadeInDown">
                        <div class="our-services-overlay"></div>
                        <span class="tf-icon icon-medium horizontal-center"><img src="{{ asset('icon/icon_plester.svg') }}" class="" alt=""></span>
                        <div class="content-features">
                            <a href="">
                                <h3 class="section-heading-jost-size22">
                                    Cepat Sembuhkan Luka Tanpa Iritasi</h3>
                            </a>
                            <p class="section-desc">
                                Dengan bahan-bahan alami ekstrak maggot BSF dan brotowali, MaggoPlast-Gel mempercepat penyembuhan luka tanpa menimbulkan iritasi.<br>
                            </p>
                            <div class="link2 link-style2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-four-column">
                    <div class="our-services-box hover-up-style2 mg-bottom30 wow fadeInDown">
                        <div class="our-services-overlay"></div>
                        <span class="tf-icon icon-medium horizontal-center"><img src="{{ asset('icon/icon_environment.svg') }}" class="" alt=""></span>
                        <div class="content-features">
                            <a href="">
                                <h3 class="section-heading-jost-size22">
                                    Organik dan Ramah Lingkungan</h3>
                            </a>
                            <p class="section-desc">
                                Tidak seperti plester berbahan plastik, MaggoPlast-Gel terbuat dari bahan-bahan organik yang mudah terurai, berkontribusi pada lingkungan yang lebih sehat.<br>
                            </p>
                            <div class="link2 link-style2">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-four-column">
                    <div class="our-services-box hover-up-style2 wow fadeInLeft">
                        <div class="our-services-overlay"></div>
                        <span class="tf-icon icon-medium horizontal-center"><img src="{{ asset('icon/icon_comfort.svg') }}" class="" alt=""></span>
                        <div class="content-features">
                            <a href="">
                                <h3 class="section-heading-jost-size22">
                                    Fleksibel dan Nyaman</h3>
                            </a>
                            <p class="section-desc">
                                Gel cair mudah diaplikasikan, tidak lengket, tahan air, dan memberikan sensasi dingin yang menenangkan. Bebas beraktivitas tanpa khawatir plester terlepas.
                            </p>
                            <div class="link2 link-style2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-four-column">
                    <div class="our-services-box hover-up-style2 wow fadeInRight">
                        <div class="our-services-overlay"></div>
                        <span class="tf-icon icon-medium horizontal-center"><img src="{{ asset('icon/icon_easy_to_use.svg') }}" class="" alt=""></span>
                        <div class="content-features">
                            <a href="#">
                                <h3 class="section-heading-jost-size22">
                                    Praktis dan Higienis
                                </h3>
                            </a>
                            <p class="section-desc">
                                Dengan kemasan aplikator pump, MaggoPlast-Gel memudahkan Anda dalam penggunaan kapan saja dan di mana saja, tanpa menyentuh langsung luka.
                            </p>
                            <div class="link2 link-style2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Our service -->

    <!-- Our team -->
    <section class="flat-team">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-box">
                        <h4 class="section-subtitle white wow fadeInUp">KENALI ITM KAMI</h4>
                        <h2 class="section-title white wow fadeInUp">Tim Kami</h2>
                    </div>
                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="60" data-smobile="60">
                    </div>
                </div>
            </div>
        </div>
        <!-- list team -->
        <div class="container">
            <div class="row">
                <div class="list-team">
                    <div class="item-three-column mb-2">
                        <div class="team-box wow fadeInUp">
                            <div class="image-staff">
                                <div class="backround-overlay"></div>
                                <div class="list-icon-hidden">
                                    <ul class="widgets-nav-social link-style3">
                                        <li><a href="https://www.instagram.com/nengwiwi19/"><i class="fa fa-brands fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                                <img src="{{ asset('images/team/wiwi.webp') }}" alt="images">
                            </div>
                            <div class="info-staff link-style4">
                                <h3 class="section-heading-rubik-size20"> Neng Wiwi W </h3>
                                <p class="section-desc-2 white"> CEO </p>
                            </div>
                        </div>
                    </div>
                    <div class="item-three-column mb-2">
                        <div class="team-box wow fadeInUp">
                            <div class="image-staff">
                                <div class="backround-overlay"></div>
                                <div class="list-icon-hidden">
                                    <ul class="widgets-nav-social link-style3">
                                        <li><a href="https://www.instagram.com/ferryhazra/"><i class="fa fa-brands fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                                <img src="{{ asset('images/team/fahrizal.webp') }}" alt="images">
                            </div>
                            <div class="info-staff link-style4">
                                <h3 class="section-heading-rubik-size20"> Ir. Fahrizal Hazra, M.Sc </h3>
                                <p class="section-desc-2 white"> Dosen Pendamping </p>
                            </div>
                        </div>
                    </div>
                    <div class="item-three-column mb-2">
                        <div class="team-box wow fadeInUp">
                            <div class="image-staff">
                                <div class="backround-overlay"></div>
                                <div class="list-icon-hidden">
                                    <ul class="widgets-nav-social link-style3">
                                        <li><a href="https://www.instagram.com/renhardbker/"><i class="fa fa-brands fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                                <img src="{{ asset('images/team/renhard.webp') }}" alt="images">
                            </div>
                            <div class="info-staff link-style4">
                                <h3 class="section-heading-rubik-size20"> Renhard Al Rasyid </h3>
                                <p class="section-desc-2 white"> CTO </p>
                            </div>
                        </div>
                    </div>
                    <div class="item-three-column mb-2">
                        <div class="team-box wow fadeInUp">
                            <div class="image-staff">
                                <div class="backround-overlay"></div>
                                <div class="list-icon-hidden">
                                    <ul class="widgets-nav-social link-style3">
                                        <li><a href="https://www.instagram.com/noviaqisthi/"><i class="fa fa-brands fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                                <img src="{{ asset('images/team/novia.webp') }}" alt="images">
                            </div>
                            <div class="info-staff link-style4">
                                <h3 class="section-heading-rubik-size20"> Novia Miftakhul </h3>
                                <p class="section-desc-2 white"> CFO </p>
                            </div>
                        </div>
                    </div>
                    <div class="item-three-column mb-2">
                        <div class="team-box wow fadeInUp">
                            <div class="image-staff">
                                <div class="backround-overlay"></div>
                                <div class="list-icon-hidden">
                                    <ul class="widgets-nav-social link-style3">
                                        <li><a href="https://www.instagram.com/sucimeyditiaa/"><i class="fa fa-brands fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                                <img src="{{ asset('images/team/suci.webp') }}" alt="images">
                            </div>
                            <div class="info-staff link-style4">
                                <h3 class="section-heading-rubik-size20"> Suci Meyditia </h3>
                                <p class="section-desc-2 white"> CMO </p>
                            </div>
                        </div>
                    </div>
                    <div class="item-three-column mb-2">
                        <div class="team-box wow fadeInUp">
                            <div class="image-staff">
                                <div class="backround-overlay"></div>
                                <div class="list-icon-hidden">
                                    <ul class="widgets-nav-social link-style3">
                                        <li><a href="https://www.instagram.com/senifitriani_/"><i class="fa fa-brands fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                                <img src="{{ asset('images/team/seni.webp') }}" alt="images">
                            </div>
                            <div class="info-staff link-style4">
                                <h3 class="section-heading-rubik-size20"> Seni Fitriani </h3>
                                <p class="section-desc-2 white"> CPO </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- /Our team -->


    <!-- Testimonials -->
    <section class="flat-testimonials">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="119" data-mobile="60" data-smobile="0">
                    </div>
                    <div class="section-title-box">
                        <h4 class="section-subtitle wow fadeInUp">TESTIMONI PELANGGAN</h4>
                        <h2 class="section-title">Kata mereka </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme wow fadeInUp">
                        <div class="item">
                            <div class="list-testimonials">
                                <div class="box-item">
                                    <div class="box-item-overlay"></div>
                                    <div class="staff-img">
                                        <img src="{{ asset('images/testimoni/testimoni-2.png')}}" alt="images">
                                    </div>
                                    <p class="section-desc mg-bottom-15">
                                        Produknya sangat inovatif, sangat
                                        cocok digunakan walaupun sedang
                                        beraktivitas karena plasternya
                                        berbentuk gel dan bening sehingga
                                        mudah diaplikasikan serta tidak
                                        mengganggu penampilan.
                                    </p>
                                    <h4 class="section-desc-heading">Intan Naresya</h4>
                                    <p class="section-desc des-2"> Mahasiswi </p>
                                    <div class="icon-box">
                                        <a class="icon-inner-box"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-testimonials">
                            <div class="box-item">
                                <div class="box-item-overlay active"></div>
                                <div class="staff-img">
                                    <img src="{{ asset('images/testimoni/testimoni-1.png')}}" alt="images">
                                </div>
                                <p class="section-desc mg-bottom-15">
                                    Udah order kedua kali soalnya yang
                                    pertama udah habis dan sangat
                                    bermanfaat, cocok banget buat yang
                                    sering terluka ringan karena produk
                                    plester ini tuh bikin luka cepet
                                    sembuh, sukses terus min.
                                </p>
                                <h4 class="section-desc-heading">Dessifa</h4>
                                <p class="section-desc des-2">Mahasiswi</p>
                                <div class="icon-box">
                                    <a class="icon-inner-box"></a>
                                </div>
                            </div>
                        </div>

                        <div class="list-testimonials">
                            <div class="box-item">
                                <div class="box-item-overlay"></div>
                                <div class="staff-img">
                                    <img src="{{ asset('images/testimoni/testimoni-3.png')}}" alt="images">
                                </div>
                                <p class="section-desc mg-bottom-15">
                                    Baru pertama kali pakai produk plester
                                    yang bentuknya gel bener-bener
                                    inovatif, luka gores aku jadi cepet
                                    sembuh hehe. Nanti kalo abis gass
                                    beli lagii
                                </p>
                                <h4 class="section-desc-heading">Amanda Tsa Tsa</h4>
                                <p class="section-desc des-2">Mahasiswi</p>
                                <div class="icon-box">
                                    <a class="icon-inner-box"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Testimonials -->




    <!-- blog -->
    <section class="flat-blog-home01">
        <div class="container">
            <div class="row">
                <div class="section-title-box">
                    <h4 class="section-subtitle  wow fadeInUp">ARTIKEL TERBARU</h4>
                    <h2 class="section-title  wow fadeInUp">Berita dan Kegiatan Kami</h2>
                </div>
                <div class="col-md-12">
                    <div class="slide-blog-content">
                        <div class="owl-carousel owl-theme horizontal-center">


                            @if (isset($articles))
                                {{-- Looping Article --}}
                                @foreach ($articles as $article)
                                    <div class="item wow fadeInUp">
                                        <div class="blog-item hover-up-style2" style="background-image: url(/storage/{{ $article->thumbnail }})">
                                            <div class="item-overlay"></div>
                                            <div class="item-box link">
                                                <div class="content-info"><a href="/artikel/{{ $article->slug }}" class="folder">
                                                        {{ $article->articleCategory->name }}
                                                    </a></div>
                                                <div class="link-style6">
                                                    <div class="content-info margin-top"><a href="/artikel/{{ $article->slug }}" class="user">
                                                            By Admin
                                                        </a></div>
                                                    <a href="/artikel/{{ $article->slug }}" class="section-heading-jost-size20">
                                                        {{ Str::substr($article->title, 0, 44) }} ..
                                                    </a>
                                                </div>
                                                <hr class="line-blog-item">
                                                <h4 class="sub-title">
                                                    {{ $article->created_at->format('d F, Y') }}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class=" mt-2 mb-2 text-custom-grey text-center ">Belum ada artikel.</div>

                            @endif


                            {{-- <div class="item wow fadeInUp">
                                <div class="blog-item background2 hover-up-style2">
                                    <div class="item-overlay"></div>
                                    <div class="item-box box-2">
                                        <div class="content-info "><a href="blog.html" class="folder folder-2">
                                                Gardening Ideas
                                            </a></div>
                                        <div class="link-style6">
                                            <div class="content-info margin-top"><a href="blog-detail.html" class="user">
                                                    By Admin
                                                </a></div>
                                            <a href="blog-detail.html" class="section-heading-jost-size20">
                                                Quisque suscipit ipsum est, eu venenatis leo
                                            </a>
                                        </div>
                                        <hr class="line-blog-item">
                                        <h4 class="sub-title">
                                            28 JANUARY, 2020
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="item wow fadeInUp">
                                <div class="blog-item background3 hover-up-style2">
                                    <div class="item-overlay"></div>
                                    <div class="item-box box-3">
                                        <div class="content-info"><a href="blog.html" class="folder folder-3">
                                                Gardening Ideas
                                            </a></div>
                                        <div class="link-style6">
                                            <div class="content-info margin-top"><a href="blog-detail.html" class="user">
                                                    By Admin
                                                </a></div>
                                            <a href="blog-detail.html" class="section-heading-jost-size20">
                                                Maecenas interdum lorem eleifend orci aliquam
                                            </a>
                                        </div>
                                        <hr class="line-blog-item">
                                        <h4 class="sub-title">
                                            28 JANUARY, 2020
                                        </h4>
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="60" data-smobile="0">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /blog -->



@endsection



@push('scripts')

@endpush
