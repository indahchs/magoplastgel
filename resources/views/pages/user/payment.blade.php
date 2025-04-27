@extends('layouts.main')

@section('title', '')

@push('style')
    <script type="text/javascript"
        src="https://app.midtrans.com/snap/snap.js"
        data-client-key="{{ Config::get('app.midtrans_client_key') }}"></script>


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
                                Pembayaran
                            </div>
                            <div class="page-title-content link-style6">
                                <span><a class="home" href="{{ route('user.home') }}">Beranda</a></span><span class="page-title-content-inner"><a class="home" href="{{ route('user.product') }}">Produk</a></span><span class="page-title-content-inner">Checkout</span>
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
                        <h3 class="section-heading-rubik-size20 text-custom-primary">Total Tagihan</h3>
                        <h3 class="section-heading-rubik-size20 text-custom-primary mb-2 rupiah">{{ $totalPayment }}</h3>

                        @if ($isPaid === false )
                            <button id="pay-button" class="btn button-custom-primary mb-2 w-100">Bayar</button>
                            <p class="text-custom-grey text-center">Dengan melanjutkan pembayaran, Anda setuju dengan ketentuan yang berlaku.</p>
                        @else
                            <a href="{{ route('user.home') }}" class="btn button-custom-primary mb-2 w-100">Kembali</a>
                            <p class="text-custom-grey text-center">Pesanan sudah dibayar.</p>
                        @endif

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
    <script src="{{ asset('js/rupiah.js') }}"></script>
    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}');
            // customer will be redirected after completing payment pop-up
        });

    </script>
@endpush
