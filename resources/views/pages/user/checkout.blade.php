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
                                Checkout
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
                    <div class="col-12">
                        <div class="d-flex">
                            <span class="icon-map"><i class="color-primary fa fa-solid fa-location-dot"></i></span>
                            <h3 class="section-heading-rubik-size20 text-custom-primary">Alamat Pengiriman</h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-1">
                       <strong><h3 class="text-custom-primary section-custom-medium">{{ Auth::user()->name }} <br>({{ Auth::user()->phone_number }})</h3></strong>
                    </div>
                    <div class="col-md-7 mb-1">
                        <p class="desc-box text-custom-primary">
                            {{ Auth::user()->address_detail }}
                        </p>
                    </div>
                    <div class="col-md-2">
                        <p class="desc-box text-custom-grey text-right"> <a href="" ></a></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Desktop View -->
        <section class="large-view-product ">
            <div class="container chekcout-section box-shadow wow fadeInUp">
                <div class="row mb-1">
                    <div class="col-12">
                        <div class="d-flex">
                            <h3 class="section-heading-rubik-size20 text-custom-primary">Pesanan Anda</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center"><strong>Produk</strong></th>
                                <th class="text-center"><strong>Harga Satuan</strong></th>
                                <th class="text-center"><strong>Jumlah</strong></th>
                                <th class="text-right"><strong>Subtotal</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="row-product">
                                <td>
                                    <div class=" d-flex">
                                        @if (isset($order))
                                            <div class="product-small">
                                                <img src="{{('/storage/'.$order->orderItems[0]->product->productImages[0]->path)}}" alt="Maggoplastgel">
                                            </div>
                                        @else
                                            <div class="product-small">
                                                <img src="{{asset('images/testimonials/young-beautiful-florist-watering-flowers.jpg')}}" alt="Maggoplastgel">
                                            </div>
                                        @endif
                                        <p class="vertical-center">{{ $order->orderItems[0]->product->name }}</p>
                                    </div>
                                </td>
                                <td class="vertical-center text-center rupiah">{{ $order->orderItems[0]->product->price }}</td>
                                <td class="vertical-center text-center">{{ $order->orderItems[0]->quantity }}</td>
                                <td class="vertical-center text-right rupiah">{{ ($order->orderItems[0]->product->price) * ($order->orderItems[0]->quantity) }}</td>
                            </tr>
                            <tr class="row-product-subtotal">
                                <td colspan="3" class="text-right">
                                    <strong>Total Produk ({{ $order->orderItems[0]->quantity }})</strong>
                                </td>
                                <td class="text-right  rupiah">{{ ($order->orderItems[0]->product->price) * ($order->orderItems[0]->quantity) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="row mb-1">
                    <div class="col-12">
                        <div class="d-flex">
                            <h3 class="section-heading-rubik-size20 text-custom-primary">Total Pesanan</h3>
                        </div>
                    </div>
                </div>

                <div class="total-payment">
                    <div class="row">
                        <div class="col-md-8 ">
                            <p class="text-custom-primary text-right"><strong>Subtotal untuk Produk</strong></p>
                        </div>
                        <div class="col-md-4">
                            <p class="text-custom-primary text-right rupiah">{{ ($order->orderItems[0]->product->price) * ($order->orderItems[0]->quantity) }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <p class="text-custom-primary text-right"><strong>Total Ongkos Kirim</strong></p>
                        </div>
                        <div class="col-md-4">
                            <p class="text-custom-primary text-right rupiah">{{ $order->shipping_cost }}</p>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-8">
                            <p class="text-custom-primary text-right"><strong>Kode Unik</strong></p>
                        </div>
                        <div class="col-md-4">
                            <p class="text-custom-primary text-right rupiah">
                                @php
                                    $uniqueCode = rand(100, 999);
                                    echo $uniqueCode;
                                @endphp
                            </p>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-md-8">
                            <p class="text-custom-primary text-right"><strong>Total Pembayaran</strong></p>
                        </div>
                        <div class="col-md-4">
                            <p class="text-custom-primary text-right section-custom-medium "><strong>
                                <span class="rupiah">{{ ($order->orderItems[0]->product->price) * ($order->orderItems[0]->quantity) + ($order->shipping_cost) }}</span>
                            </strong></p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mb-1">
                    <div class="col-md-8">
                        <p class="text-custom-grey text-left">Dengan melanjutkan pembayaran, Anda setuju dengan ketentuan yang berlaku.</p>
                    </div>
                    <div class="col-md-4">
                        <div class="wrap-button">
                            <button class="btn button-custom-primary" onclick="event.preventDefault(); document.getElementById('checkoutForm').submit()">Bayar</button>
                            <form action="{{ route('user.checkout.store', Crypt::encrypt($order->order_number)) }}"
                                method="POST"
                                id="checkoutForm"
                                style="display:none">
                                    @csrf
                                    @method('POST')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Mobile View --}}
        <section class="small-view-product  box-shadow">
            <div class="container  wow fadeInUp">
                <div class="row mb-1">
                    <div class="col-12">
                        <div class="d-flex">
                            <h3 class="section-heading-rubik-size20 text-custom-primary">Pesanan Anda</h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="d-flex">
                        <div class="">
                            <div class="product-small">
                                <img src="{{asset('images/testimonials/young-beautiful-florist-watering-flowers.jpg')}}" alt="images">
                            </div>
                        </div>
                        <div class="">
                            <p class="text-custom-primary">{{ Str::substr('Maggoplast ahutttt Maggoplast ahutttt Maggoplast ahutttt Maggoplast ahutttt', 0, 60)  }}..</p>
                            <p class="text-custom-primary text-custom-grey text-right">5x</p>
                            <p class="text-custom-primary text-custom-grey text-right">Rp30.000</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <hr>
                    <div class="mobile-subtotal-product">
                        <h3 class="section-custom-medium text-custom-primary"><strong>Total Produk ({{ $order->orderItems[0]->quantity }})</strong></h3>
                        <p class="text-custom-primary text-right">{{ ($order->orderItems[0]->product->price) * ($order->orderItems[0]->quantity) }}</p>
                    </div>
                </div>
                <div class="row">
                    <hr>
                    <div class="mobile-subtotal-product">
                        <h3 class="section-custom-medium text-custom-primary"><strong>Total Pesanan</strong></h3>
                    </div>
                </div>

                <div class="row">
                    <div class="mobile-subtotal-product">
                        <p class="text-custom-primary text-left"><strong>Subtotal untuk Produk</strong></p>
                        <p class="text-custom-primary text-right rupiah">{{ ($order->orderItems[0]->product->price) * ($order->orderItems[0]->quantity) }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="mobile-subtotal-product">
                        <p class="text-custom-primary text-left"><strong>Total Ongkos Kirim</strong></p>
                        <p class="text-custom-primary text-right rupiah">{{ $order->shipping_cost }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="mobile-subtotal-product">
                        <p class="text-custom-primary text-left"><strong>Total Pembayaran</strong></p>
                        <p class="text-custom-primary text-right section-custom-medium "><strong>
                            <span class="rupiah">{{ ($order->orderItems[0]->product->price) * ($order->orderItems[0]->quantity) + $order->shipping_cost }}</span>
                        </strong></p>
                    </div>
                </div>

                <hr>

                <div class="row mb-1">
                    <div class="wrap-button">
                        <button class="btn button-custom-primary w-100 mb-1" onclick="event.preventDefault(); document.getElementById('checkoutForm').submit()">Bayar</button>
                        <form action="{{ route('user.checkout.store', Crypt::encrypt($order->order_number)) }}"
                            method="POST"
                            id="checkoutForm"
                            style="display:none">
                                @csrf
                                @method('POST')
                        </form>
                    </div>

                    <p class="text-custom-grey text-center">Dengan melanjutkan pembayaran, Anda setuju dengan ketentuan yang berlaku.</p>


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

@endpush
