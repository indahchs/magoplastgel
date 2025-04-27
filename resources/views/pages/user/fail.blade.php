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
                        {{-- <div class="overlay-image"></div> --}}
                        <div class="banner-title">
                            <div class="page-title-heading">
                                Status Pembayaran
                            </div>
                            <div class="page-title-content link-style6">
                                {{-- <span><a class="home" href="{{ route('user.home') }}">Beranda</a></span><span class="page-title-content-inner"><a class="home" href="{{ route('user.product') }}">Produk</a></span>  --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.page-title -->


        <!-- Address -->
        <section class="section-address">
            <div class="container chekcout-section border-top box-shadow wow fadeInUp">
                <div class="row mb-1">
                    <div class="col-12 text-center">

                        <img src="{{ asset('status/cancel.png') }}" class="gif-status" alt="Success">
                        <h3 class="section-heading-rubik-size20 text-custom-primary mt-2">Pembayaran Gagal</h3>
                        <p class="text-custom-grey text-center mt-1">Maaf, terjadi kendala dalam proses pembayaran Anda. Silakan cek kembali metode pembayaran atau coba lagi beberapa saat lagi</p>

                        <a href="{{ route('user.home') }}" class="btn button-custom-primary w-25 mt-2 mb-2">Beranda</a>
                    </div>
                </div>

            </div>
        </section>

        <div class="row mt-5"></div>
        <div class="row mt-5"></div>
        <div class="row mt-5"></div>
        <!-- /Contact -->

    </div>

@endsection


@push('scripts')

@endpush
