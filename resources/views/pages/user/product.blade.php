@extends('layouts.main')

@section('title', '')

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
                                Produk
                            </div>
                            <div class="page-title-content link-style6">
                                <span><a class="home" href="{{ route('user.home') }}">Beranda</a></span><span class="page-title-content-inner">Produk</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- /.page-title -->


        <!-- Contact -->
        <section class="flat-contact-page">
            <div class="container">
                <div class="row">
                    @if (isset($product))
                        <div class="col-md-6 wow fadeInUp">
                            <div class="contact-left">
                                <div class="main-image mb-1">
                                    <img src="{{ $product->productImages->isNotEmpty() ? ('storage/'.$product->productImages[0]->path) : asset('images/product/empty-image.png') }}" alt="Maggoplastgel">
                                </div>
                                <div class="slider-images d-flex">
                                    @if ($product->productImages->isNotEmpty())
                                        @foreach ($product->productImages as $index => $image)
                                            <div class="single-image {{ $index === 0 ? 'image-active' : '' }}">
                                                <img src="{{ ('storage/'.$image->path) }}" alt="Maggoplastgel">
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="single-image image-active">
                                            <img src="{{ asset('images/product/empty-image.png') }}" alt="Maggoplastgel">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="30" data-smobile="30"></div>
                        </div>
                        <div class="col-md-6 wow fadeInUp">
                            <div class="contact-right">
                                <div class="section-title mb-1">{{ $product->name }}</div>
                                <div class="product-price mb-2 rupiah">{{ $product->price }}</div>
                                <div class="section-desc mb-2">
                                    {{ $product->description }}
                                </div>
                                <div class="quantity-section">
                                    <div class="minus-counter active" id="minus-counter">
                                        <span>-</span>
                                    </div>
                                    <div class="order-quantity">
                                        <form action="/product/checkout/{{ $product->id }}" method="POST" id="productForm">
                                            @csrf
                                            <input type="number" name="quantity" id="quantity" value="1" required>
                                        </form>
                                    </div>
                                    <div class="plus-counter active" id="plus-counter">
                                        <span>+</span>
                                    </div>
                                </div>
                                <div class="button">
                                    <button type="submit" class="btn btn-left" form="productForm">Beli Sekarang</button>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="product-price mb-1 text-custom-grey text-center">Belum ada produk.</div>

                    @endif

                </div>
            </div>
        </section>
        <!-- /Contact -->

    </div>

@endsection


@push('scripts')
    <script src="{{ asset('js/rupiah.js') }}"></script>

@endpush
