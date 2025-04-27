@extends('layouts.main')

@section('title', 'Blog - ')

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
                        @if(request('kategori'))
                        <h3 class="widgets-side-bar-title">
                            Kategori{{ ": " . $category_name }}
                        </h3>
                        @endif
                        @if(request('tag'))
                        <h3 class="widgets-side-bar-title">
                            Tag: {{ request('tag') }}
                        </h3>
                        @endif
                        <div class="post-wrap">

                            <!-- start art -->
                            @foreach ($articles as $article)
                            <article class="article-4">
                                <div class="image-box">
                                    <div class="image">
                                        <img src="/storage/{{ $article->thumbnail }}" alt="image" class="article-thumbnail">
                                    </div>
                                    <div class="date-image">
                                        <p>{{ $article->created_at->format('d F, Y') }}</p>
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
                                                <a href="?kategori={{ $article->article_category_id }}" class="line text-decs">
                                                    {{ $article->articleCategory->name }}
												</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="content-art">
                                        <a href="/artikel/{{ $article->slug }}" class="section-heading-jost-size28 article-title">
                                            {{ $article->title }}
                                        </a>
                                        <p class="desc-content-box text-decs article-description">
                                            {{ strip_tags($article->body) }}
                                        </p>
                                        <div class="link-style2">
                                            <a href="/artikel/{{ $article->slug }}" class="read-more">
                                                Read More<i class="fas fa-long-arrow-alt-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            @endforeach
                            <!-- end art1-->
                            <div class="themesflat-pagination clearfix">
                                @if ($articles->hasPages())
                                <ul>
                                    @if (!$articles->onFirstPage())
                                    <li><a href="{{ $articles->previousPageUrl() }}" class="page-numbers prev"><span class="fa fa-angle-left"></span></a></li>
                                    @endif

                                    @for ($page = 1; $page <= $articles->lastPage(); $page++)
                                        <li><a href="{{ $articles->url($page) }}" class="page-numbers {{ ($page == $articles->currentPage()) ? "current" : "" }}">{{ $page }}</a></li>
                                    @endfor

                                    @if ($articles->hasMorePages())
                                    <li><a href="{{ $articles->nextPageUrl() }}" class="page-numbers next"><span class="fa fa-angle-right"></span></a></li>
                                    @endif


                                    {{-- <li><a href="#" class="page-numbers prev"><span class="fa fa-angle-left"></span></a></li>
                                    <li><a href="#" class="page-numbers current">1</a></li>
                                    <li><a href="#" class="page-numbers">2</a></li>
                                    <li><a href="#" class="page-numbers">3</a></li>
                                    <li><a class="page-numbers">...</a></li>
                                    <li><a href="#" class="page-numbers">10</a></li>
                                    <li><a href="#" class="page-numbers next"><span class="fa fa-angle-right"></span></a></li> --}}
                                </ul>
                                @endif

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
                                    <form method="get" role="search" class="search-form" action="">
                                        <input type="search" class="search-field" placeholder="Ketik disini.." value="{{ request('search') ?? '' }}" name="search" title="Search for">
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
    <script>
        $('.search-form').submit(function(e) {
            e.preventDefault(); // Mencegah pindah halaman

            var search = $('.search-field').val();
            var currentUrl = new URL(window.location.href);
            currentUrl.searchParams.append('search', search);
            window.location.href = currentUrl.toString();
        })
    </script>
@endpush
