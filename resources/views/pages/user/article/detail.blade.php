@extends('layouts.main')

@section('title', $article->title . " - ")

@push('style')
<link rel="stylesheet" href="{{ asset('stylesheet/article.css') }}">
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
                                <span><a class="home" href="{{ route('user.article') }}">Beranda</a></span><span class="page-title-content-inner">Detail Artikel</span>
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
                                        <img src="/storage/{{ $article->thumbnail }}" alt="image" class="article-thumbnail">
                                    </div>
                                </div>
                                <div class="content mg-top-15">
                                    <span class="content-info"><a href="#" class="user">
									BY ADMIN
								</a><a href="#" class="date">
									{{ $article->created_at->format('d F, Y') }}
								</a></span>
                                    <div class="heading-content-box">
                                        <a href="#">
									{{ $article->title }}
								</a></div>
                                    <div class="article-body">
                                        {!! $article->body !!}
                                    </div>
                                    <
                                    {{-- <p class="desc-content-box text-decs">
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
                                    </ul> --}}

                                    <hr>
                                    <div class="bottom-content">
                                        <div class="related-tag">
                                            <h3 class="title heading-16px-rubik">Related Tags :</h3>
                                            @php
                                                $tags = explode(',', $article->tags);
                                            @endphp
                                            <ul class="list-related">
                                                @foreach ($tags as $tag)
                                                <li><a href="/artikel?tag={{ $tag }}">#{{ $tag }}</a></li>
                                                    
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="social-share">
                                            <h3 class="title2 heading-16px-rubik">Share :</h3>
                                            <ul class="widgets-nav-social">
                                                <li>
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" target="_blank">
                                                        <i class="fa-brands fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://twitter.com/intent/tweet?url={{ Request::url() }}&text={{ $article->title }}" target="_blank">
                                                        <i class="fa-brands fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://wa.me/?text={{ $article->title }}%20{{ Request::url() }}" target="_blank">
                                                        <i class="fa-brands fa-whatsapp"></i>
                                                    </a>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    {{-- <div class="widgets-comment">
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
                                    </div> --}}
                                    <!-- comments -->
                                    <!-- input comment -->
                                    {{-- <div class="widgets-post-comment">
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
                                    </div> --}}
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
                                    <form method="get" role="search" class="search-form" action="/artikel">
                                        <input type="search" class="search-field" placeholder="Search here" value="" name="search" title="Search for">
                                        <button class="search-submit" type="submit" title="Search"></button>
                                    </form>
                                </div>
                            </div>
                            <div class="widgets-category">
                                <h3 class="widgets-side-bar-title">
                                    Kategori
                                </h3>
                                <ul class="list-category">
                                    @foreach ($categories as $category)
                                    <li><a href="/artikel?kategori={{ $category->id }}">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget widget_lastest">
                                <h2 class="widgets-side-bar-title"><span>Artikel Terbaru</span></h2>
                                <ul class="lastest-posts data-effect clearfix">
                                    @foreach ($newest_articles as $article)
                                    <li class="clearfix">
                                        <div class="thumb data-effect-item has-effect-icon">
                                            <img src="/storage/{{ $article->thumbnail }}" alt="Image" class="newest-article-thumbnail">
                                        </div>
                                        <div class="text">
                                            <h3><a href="/artikel/{{ $article->slug }}" class="title-thumb article-title">{{ $article->title }}</a></h3>
                                            <a href="#" class="date">{{ $article->created_at->format('d F') }}</a>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>



                                    </div>
                                </div>
                            </div> --}}
                            

                                    </div>
                                </div>
                            </div> --}}
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
