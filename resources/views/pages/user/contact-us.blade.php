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
                                Kontak
                            </div>
                            <div class="page-title-content link-style6">
                                <span><a class="home" href="{{ route('user.home') }}">Beranda</a></span><span class="page-title-content-inner">Kontak</span>
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
                    <div class="col-md-5 wow fadeInUp">
                        <div class="contact-left">
                            <h3 class="section-subtitle mg-bottom-22">HUBUNGI KAMI</h3>
                            <h2 class="section-title mg-bottom-15">Temukan kami pada lokasi berikut.</h2>
                            <p class="section-desc mg-bottom-60"></p>
                            <div class="address-box mg-bottom30">
                                <div class="contact-location icon-map"></div>
                                <div class="info text-pri2-color">
                                        <h3 class="section-heading-jost-size20">
                                            Alamat kami</h3>
                                    <p class="desc-box text-pri2-color">Jalan Malabar Ujung No. 53</p>
                                </div>
                            </div>
                            <div class="address-box mg-bottom30">
                                <div class="contact-phone icon-phone"></div>
                                <div class="info text-pri2-color">
                                        <h3 class="section-heading-jost-size20">
                                            No. Hp</h3>
                                    <p class="desc-box text-pri2-color">0895 2938 1083</p>
                                </div>
                            </div>
                            <div class="address-box">
                                <div class="contact-mail icon-mail"></div>
                                <div class="info text-pri2-color">
                                        <h3 class="section-heading-jost-size20">
                                            Email kami</h3>
                                    <p class="desc-box text-pri2-color">maggoplastgel@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="30" data-smobile="30"></div>
                    </div>
                    <div class="col-md-7 wow fadeInUp">
                        <div class="contact-right">
                            <form method="POST" class="form-contact-right" id="contactform" action="{{ route('contact.mail') }}" accept-charset="utf-8" novalidate="novalidate">
                                @csrf
                                @method('POST')
                                <div class="input-row">
                                    <div class="input-name">
                                        <label for="name" class="heading-features">Nama* </label>
                                        <input id="name" name="name" class="input-contact" type="text" placeholder="Nama Lengkap" required>
                                    </div>
                                    <div class="input-phone">
                                        <label for="phone" class="heading-features">No Hp</label>
                                        <input id="phone" name="phone" class="input-contact" type="number" placeholder="Nomor Hp" required>
                                    </div>

                                </div>
                                <div class="input-row">
                                    <div class="input-email">
                                        <label id="email" class="heading-features">Email*</label>
                                        <input type="email" name="email" class="input-contact" placeholder="Alamat Email" required>
                                    </div>
                                    <div class="input-services">
                                        <label for="services" class="heading-features">Keperluan </label>
                                        <select class="input-contact input-select" name="services" id="services">
														{{-- <option value="0">Choose services</option> --}}
														<option value="Beli Produk">Beli Produk</option>
														<option value="Kerja Sama">Kerja Sama</option>
														<option value="Pemodalan">Pemodalan</option>
													</select>
                                    </div>
                                </div>
                                <div class="input-message">
                                    <label for="message" class="heading-features">Pesan Anda*</label>
                                    <textarea name="message" class="input-contact-message" id="message" placeholder="Pesan Anda"></textarea>
                                </div>
                                <div class="button mb-2">
                                    <button type="submit" class=" btn btn-left">Kirim Pesan</button>
                                </div>
                                {{-- <div class="flat-alert msg-success text-custom-primary">
                                    Pesan berhasil dikirim ke administrator.
                                    <a class="close" href="#"><i class="fa fa-close"></i></a>
                                </div> --}}

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Contact -->

    </div>

@endsection


@push('scripts')

@endpush
