@extends('layouts.main')

@section('title', 'Blog - ')

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
                                Artikel
                            </div>
                            <div class="page-title-content link-style6">
                                <span><a class="home" href="{{ route('user.home') }}">Beranda</a></span><span class="page-title-content-inner">Artikel</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- /.page-title -->

        <!-- main content -->
        <section class="flat-blog-standard">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="themesflat-spacer clearfix" data-desktop="47" data-mobile="0" data-smobile="0"></div>
                    </div>
                    <div class="col-md-8">
                        <div class="post-wrap">

                            <!-- start art -->
                            <article class="article-1 mb-1">
                                <div class="image-box">
                                    <div class="image">
                                        <img src="{{asset('images/blog/close-up-picture-hand-holding-wooden-tray-which-full-pots-plants.jpg')}}" alt="image">
                                    </div>
                                    <div class="date-image">
                                        <p>28 JANUARY, 2021</p>
                                    </div>
                                </div>
                                <div class="content-box">

                                    <div class="content-art">
                                        <a href="{{ route('user.blog.detail') }}" class="section-heading-jost-size28">
                                        Social media-driven trading frenzy for GameStop, AMC Entertainment sparks calls for scrutiny
									</a>
                                        <p class="desc-content-box text-decs">
                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
                                        </p>
                                        <div class="link-style2">
                                            <a href="{{ route('user.blog.detail') }}" class="read-more">
											Selengkapnya<i class="fas fa-long-arrow-alt-right"></i>
										</a>
                                        </div>
                                    </div>

                                </div>
                            </article>
                            <!-- end art -->

                            <article class="article-4">
                                <div class="image-box">
                                    <div class="image">
                                        <img src="{{asset('images/blog/portrait-smiling-young-woman-holding-colorful-petunias-wooden-crate.jpg')}}" alt="image">
                                    </div>
                                    <div class="date-image">
                                        <p>28 JANUARY, 2021</p>
                                    </div>
                                </div>
                                <div class="content-box">
                                    <div class="post-content-inner">
                                        <ul>
                                            <li>
                                                <a href="#" class="text-decs">
													By admin
												</a>
                                            </li>
                                            <li>
                                                <a href="#" class="line text-decs">
													Gardening
												</a>
                                            </li>
                                            <li>
                                                <a href="#" class="text-decs">
													0 Comments
												</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="content-art">
                                        <a href="{{ route('user.blog.detail') }}" class="section-heading-jost-size28">
                                        Social media-driven trading frenzy for GameStop, AMC Entertainment sparks calls for scrutiny
									</a>
                                        <p class="desc-content-box text-decs">
                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
                                        </p>
                                        <div class="link-style2">
                                            <a href="{{ route('user.blog.detail') }}" class="read-more">
											Read More<i class="fas fa-long-arrow-alt-right"></i>
										</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <!-- end art1-->
                            <div class="themesflat-pagination clearfix">
                                <ul>
                                    <li><a href="#" class="page-numbers prev"><span class="fa fa-angle-left"></span></a></li>
                                    <li><a href="#" class="page-numbers current">1</a></li>
                                    <li><a href="#" class="page-numbers">2</a></li>
                                    <li><a href="#" class="page-numbers">3</a></li>
                                    <li><a class="page-numbers">...</a></li>
                                    <li><a href="#" class="page-numbers">10</a></li>
                                    <li><a href="#" class="page-numbers next"><span class="fa fa-angle-right"></span></a></li>
                                </ul>
                            </div>
                            <!-- end pagination-->
                        </div>
                        <!-- /.post-wrap -->
                    </div>
                    <!-- /.col-md-8 -->

                    <div class="col-md-4">
                        <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="60" data-smobile="60"></div>
                        <div class="side-bar">
                            <div class="widgets-search">
                                <h3 class="widgets-side-bar-title">
                                    Cari
                                </h3>
                                <div class="widgets-input">
                                    <form method="get" role="search" class="search-form">
                                        <input type="search" class="search-field" placeholder="Ketik disini.." value="" name="s" title="Search for">
                                        <button class="search-submit" type="submit" title="Search"></button>
                                    </form>
                                </div>
                            </div>

                            <div class="widget widget_lastest">
                                <h2 class="widgets-side-bar-title"><span>Artikel Terbaru</span></h2>
                                <ul class="lastest-posts data-effect clearfix">
                                    <li class="clearfix">
                                        <div class="thumb data-effect-item has-effect-icon">
                                            <img src="{{asset('images/blog/medium-shot-woman-holding-plant-pot.jpg')}}" alt="Image">
                                        </div>
                                        <div class="text">
                                            <h3><a href="{{ route('user.blog.detail') }}" class="title-thumb">Integer at faucibus urna. Nullam condimentum</a></h3>
                                            <a href="#" class="date">15 October</a>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="thumb data-effect-item has-effect-icon">
                                           <img src="{{asset('images/blog/close-up-picture-hand-holding-wo.jpg')}}" alt="Image">
                                        </div>
                                        <div class="text">
                                            <h3><a href="{{ route('user.blog.detail') }}" class="title-thumb">Nunc scelerisque tincidunt estibulum</a></h3>
                                            <a href="#" class="date">21 Jully</a>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="thumb data-effect-item has-effect-icon">
                                            <img src="{{asset('images/blog/planting-flowers-thumb.jpg')}}" alt="Image">
                                        </div>
                                        <div class="text">
                                            <h3><a href="{{ route('user.blog.detail') }}" class="title-thumb">Cras eu elit congue, plac erat duicidunt nisl</a></h3>
                                            <a href="#" class="date">21 December</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.widget_lastest -->

                        </div>
                        <!-- /.col-md-4 -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>    <!-- /.container -->
        </section><!-- /flat-blog -->

        <!-- / btn go top -->

    </div>

@endsection


@push('scripts')

@endpush
