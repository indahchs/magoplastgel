@extends('layouts.main')

@section('title', 'Blog Detail')

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
                                Detail Artikel
                            </div>
                            <div class="page-title-content link-style6">
                                <span><a class="home" href="{{ route('user.blog') }}">Beranda</a></span><span class="page-title-content-inner">Detail Artikel</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- /.page-title -->

        <!-- main content -->
        <section class="flat-blog-detail">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="themesflat-spacer clearfix" data-desktop="166" data-mobile="0" data-smobile="0"></div>
                    </div>
                    <div class="col-md-8">
                        <div class="post-wrap">
                            <div class="content-blog-detail">
                                <div class="image-box">
                                    <div class="image">
                                        <img src="{{ asset('images/blog/young-workers-greenhouse-feed-flowers-concept-caring-plants.jpg')}}" alt="image">
                                    </div>
                                </div>
                                <div class="content mg-top-15">
                                    <span class="content-info"><a href="#" class="user">
									BY ADMIN
								</a><a href="#" class="date">
									28 JANUARY, 2020
								</a></span>
                                    <div class="heading-content-box">
                                        <a href="#">
									Social media-driven trading frenzy for GameStop, AMC Entertainment sparks calls for scrutiny
								</a></div>


                                    <p class="desc-content-box text-decs">
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
                                        sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et
                                        accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                        invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam
                                    </p>
                                    <div class="content-note-author">
                                        <p class="desc-content-box text-decs">
                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                                        </p>
                                        <a href="#" class="author heading-16px-rubik">
                                        Marilyn Gilbert
                                    </a>

                                    </div>
                                    <p class="desc-content-box text-decs">
                                        labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam
                                    </p>
                                    <div class="image-box">
                                        <div class="image-2">
                                            <img src="{{ asset('images/blog/young-woman-working-glass-greenhouse.jpg')}}" alt="image">
                                        </div>
                                    </div>
                                    <div class="content-2 heading-content-box">
                                        <a href="#">
											AMC Entertainment sparks calls for scrutiny
									</a></div>


                                    <p class="desc-content-box text-decs">
                                        labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam
                                    </p>
                                    <ul class="nav-access-blog-detail">
                                        <li><a href="#" class="tick">sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam</a></li>
                                        <li><a href="#" class="tick">Stet clita kasd gubergren, no sea takimata sanctus</a></li>
                                        <li><a href="#" class="tick">Lorem ipsum dolor sit amet, consetetur sadipscing elitr</a></li>
                                    </ul>
                                    <hr>
                                    <div class="bottom-content">
                                        <div class="related-tag">
                                            <h3 class="title heading-16px-rubik">Related Tags :</h3>
                                            <ul class="list-related">
                                                <li><a href="#">Business.</a></li>
                                                <li><a href="#">Corporate.</a></li>
                                                <li><a href="#">Agency</a></li>
                                            </ul>
                                        </div>
                                        <div class="social-share">
                                            <h3 class="title2 heading-16px-rubik">Share :</h3>
                                            <ul class="widgets-nav-social">
                                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="widgets-comment">
                                        <div class="widgets-title-comment">
                                            Comments
                                        </div>
                                        <div class="widgets-comment-box">
                                            <div class="box-1">
                                                <div class="image-comment bd-radius-50-image">
                                                    <img src="{{ asset('images/blog/avt1.jpg')}}" alt="image">
                                                </div>
                                                <div class="content-comment">
                                                    <div class="title">
                                                        <div class="heading"> <a href="#">Laurel Wallace</a> </div>
                                                        <div class="date-comments"><a href="#">May 18</a> </div>
                                                    </div>
                                                    <p class="desc-content-box text-decs">
                                                        Proin ac quam et lectus vestibulum blandit. Nunc maximus nibh at placerat tincidunt. Nam sem lacus, ornare non ante sed, ultricies.
                                                    </p>
                                                    <div class="reply">
                                                        <a href="#">Reply</a>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="box-2">
                                                <div class="image-comment bd-radius-50-image">
                                                    <img src="{{ asset('images//blog/avt2.jpg')}}" alt="image">
                                                </div>
                                                <div class="content-comment">
                                                    <div class="title">
                                                        <div class="heading"> <a href="#">Bobby Hawkins</a> </div>
                                                        <div class="date-comments"><a href="#">December 22</a> </div>
                                                    </div>
                                                    <p class="desc-content-box text-decs">
                                                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut arcu libero, pulvinar non.
                                                    </p>
                                                    <div class="reply">
                                                        <a href="#">Reply</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- comments -->
                                    <!-- input comment -->
                                    <div class="widgets-post-comment">
                                        <div class="widgets-title-comment">
                                            Leave a Reply
                                        </div>
                                        <div class="widgets-input-box">
                                            <span><input class="tf-input input-yourname" type="text" placeholder="Your Name"></span>
                                            <span><input class="tf-input input-youremail" type="email"  placeholder="Your E-mail"></span>
                                            <span><textarea class="tf-input input-yourmessage" placeholder="Enter comment here" name="message" cols="30" rows="10"></textarea></span>
                                            <div class="tf-submit-input">
                                                <a href="#" class="tf-button">Post Comment</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.post-wrap -->

                    </div>
                    <!-- /.col-md-8 -->

                    <div class="col-md-4">
                        <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="60" data-smobile="60"></div>
                        <div class="side-bar">
                            <div class="widgets-search">
                                <h3 class="widgets-side-bar-title">
                                    Search
                                </h3>
                                <div class="widgets-input">
                                    <form method="get" role="search" class="search-form">
                                        <input type="search" class="search-field" placeholder="Search here" value="" name="s" title="Search for">
                                        <button class="search-submit" type="submit" title="Search"></button>
                                    </form>
                                </div>
                            </div>
                            <div class="widgets-category">
                                <h3 class="widgets-side-bar-title">
                                    Category
                                </h3>
                                <ul class="list-category">
                                    <li><a href="#">Tempor lorem interdum</a></li>
                                    <li><a href="#">Auctor mattis lacus </a></li>
                                    <li><a href="#">Dolor proin </a></li>
                                    <li><a href="#">Pharetra amet </a></li>
                                    <li><a href="#">Nullam dolor gravida </a> </li>
                                </ul>
                            </div>
                            <div class="widget widget_lastest">
                                <h2 class="widgets-side-bar-title"><span>Recent News</span></h2>
                                <ul class="lastest-posts data-effect clearfix">
                                    <li class="clearfix">
                                        <div class="thumb data-effect-item has-effect-icon">
                                            <img src="{{ asset('images/blog/medium-shot-woman-holding-plant-pot.jpg')}}" alt="Image">
                                            <div class="elm-link">
                                                <a href="page-blog-single.html" class="icon-2"></a>
                                            </div>
                                        </div>
                                        <div class="text">
                                            <h3><a href="#" class="title-thumb">Integer at faucibus urna. Nullam condimentum</a></h3>
                                            <a href="#" class="date">15 October</a>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="thumb data-effect-item has-effect-icon">
                                            <img src="{{ asset('images/blog/close-up-picture-hand-holding-wo.jpg')}}" alt="Image">
                                            <div class="elm-link">
                                                <a href="page-blog-single.html" class="icon-2"></a>
                                            </div>
                                        </div>
                                        <div class="text">
                                            <h3><a href="#" class="title-thumb">Nunc scelerisque tincidunt estibulum</a></h3>
                                            <a href="#" class="date">15 October</a>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="thumb data-effect-item has-effect-icon">
                                            <img src="{{ asset('images/blog/planting-flowers-thumb.jpg')}}" alt="Image">
                                            <div class="elm-link">
                                                <a href="page-blog-single.html" class="icon-2"></a>
                                            </div>
                                        </div>
                                        <div class="text">
                                            <h3><a href="#" class="title-thumb">Cras eu elit congue, plac erat duicidunt nisl</a></h3>
                                            <a href="#" class="date">15 October</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.widget_lastest -->
                            <div class="widgets-contact-info">
                                <div class="contact-info-img">
                                    <img src="{{ asset('images/blog/young-beautiful-florist-watering-flowers.jpg')}}" alt="image">
                                </div>
                                <div class="contact-info-box">
                                    <div class="contact-info-content">
                                        <div class="call-us">
                                            <div class="icon-call-us"></div>
                                            <div class="content-call-us">
                                                <div class="heading-16px-rubik">Call Us</div>
                                                <div class="heading-16px-rubik">360-779-22289</div>
                                            </div>
                                        </div>
                                        <div class="our-mail">
                                            <div class="icon-our-mail"></div>
                                            <div class="content-our-mail">
                                                <div class="heading-16px-rubik">Our Mail</div>
                                                <div class="heading-16px-rubik">yourname@mail.com</div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-4 -->
                    <div class="col-md-12">
                        <div class="themesflat-spacer clearfix" data-desktop="193" data-mobile="60" data-smobile="60"></div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /.main-content -->

    </div>

@endsection


@push('scripts')

@endpush
