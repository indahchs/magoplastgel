@extends('layouts.main')

@section('title', 'Team - ')

@push('style')

@endpush

@section('main')


    <!-- page title -->
    <div class="page-title space-header">
        <div class="container-fluid">
            <div class="row">
                <div class="">
                    <div class=""></div>
                    <div class="banner-title">
                        <div class="page-title-heading">
                            Tim Kami
                        </div>
                        <div class="page-title-content link-style6">
                            <span><a class="home" href="{{ route('user.home') }}">Beranda</a></span><span class="page-title-content-inner">Tim Kami</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- /.page-title -->


    <!-- Our team -->
    <section class="flat-team flat-team-page">
        <!-- list team -->
        <div class="container">
            <div class="row">
                <div class="list-team">
                    <div class="item-three-column mg-bottom30">
                        <div class="team-box hover-up-style2 wow fadeInUp">
                            <div class="image-staff">
                                <div class="backround-overlay"></div>
                                <div class="list-icon-hidden">
                                    <ul class="widgets-nav-social link-style3">
                                        <li><a href="https://www.instagram.com/nengwiwi19/"><i class="fa fa-brands fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                                <img src="{{asset('images/team/wiwi.webp')}}" alt="images">
                                <a class="icon-top" href="#"></a>
                            </div>
                            <div class="info-staff">
                                <h3 class="section-heading-rubik-size20 text-pri2-color"> Neng Wiwi W </h3>
                                <p class="section-desc-2"> CEO </p>
                            </div>
                        </div>
                    </div>
                    <div class="item-three-column mg-bottom30">
                        <div class="team-box hover-up-style2 wow fadeInUp">
                            <div class="image-staff">
                                <div class="backround-overlay"></div>
                                <div class="list-icon-hidden">
                                    <ul class="widgets-nav-social link-style3">
                                        <li><a href="https://www.instagram.com/ferryhazra/"><i class="fa fa-brands fa-instagram" aria-hidden="true"></i></a></li>

                                    </ul>
                                </div>
                                <img src="{{asset('images/team/fahrizal.webp')}}" alt="images">
                                <a class="icon-top" href="#"></a>
                            </div>
                            <div class="info-staff">
                                <h3 class="section-heading-rubik-size20 text-pri2-color"> Ir. Fahrizal Hazra, M.Sc </h3>
                                <p class="section-desc-2"> Dosen Pendamping </p>
                            </div>
                        </div>
                    </div>
                    <div class="item-three-column mg-bottom30">
                        <div class="team-box hover-up-style2 wow fadeInUp">
                            <div class="image-staff">
                                <div class="backround-overlay"></div>
                                <div class="list-icon-hidden">
                                    <ul class="widgets-nav-social link-style3">
                                        <li><a href="https://www.instagram.com/renhardbker/"><i class="fa fa-brands fa-instagram" aria-hidden="true"></i></a></li>

                                    </ul>
                                </div>
                                <img src="{{asset('images/team/renhard.webp')}}" alt="images">
                                <a class="icon-top" href="#"></a>
                            </div>
                            <div class="info-staff">
                                <h3 class="section-heading-rubik-size20 text-pri2-color"> Renhard Al Rasyid </h3>
                                <p class="section-desc-2"> CTO </p>
                            </div>
                        </div>
                    </div>
                    <div class="item-three-column">
                        <div class="team-box hover-up-style2 wow fadeInUp">
                            <div class="image-staff">
                                <div class="backround-overlay"></div>
                                <div class="list-icon-hidden">
                                    <ul class="widgets-nav-social link-style3">
                                        <li><a href="https://www.instagram.com/noviaqisthi/"><i class="fa fa-brands fa-instagram" aria-hidden="true"></i></a></li>

                                    </ul>
                                </div>
                                <img src="{{asset('images/team/novia.webp')}}" alt="images">
                                <a class="icon-top" href="#"></a>
                            </div>
                            <div class="info-staff">
                                <h3 class="section-heading-rubik-size20 text-pri2-color"> Novia Miftakhul </h3>
                                <p class="section-desc-2"> CFO </p>
                            </div>
                        </div>
                    </div>
                    <div class="item-three-column">
                        <div class="team-box hover-up-style2 wow fadeInUp">
                            <div class="image-staff">
                                <div class="backround-overlay"></div>
                                <div class="list-icon-hidden">
                                    <ul class="widgets-nav-social link-style3">
                                        <li><a href="https://www.instagram.com/sucimeyditiaa/"><i class="fa fa-brands fa-instagram" aria-hidden="true"></i></a></li>

                                    </ul>
                                </div>
                                <img src="{{asset('images/team/suci.webp')}}" alt="images">
                                <a class="icon-top" href="#"></a>
                            </div>
                            <div class="info-staff">
                                <h3 class="section-heading-rubik-size20 text-pri2-color"> Suci Meyditia </h3>
                                <p class="section-desc-2"> CMO </p>
                            </div>
                        </div>
                    </div>
                    <div class="item-three-column">
                        <div class="team-box hover-up-style2 wow fadeInUp">
                            <div class="image-staff">
                                <div class="backround-overlay"></div>
                                <div class="list-icon-hidden">
                                    <ul class="widgets-nav-social link-style3">
                                        <li><a href="https://www.instagram.com/senifitriani_/"><i class="fa fa-brands fa-instagram" aria-hidden="true"></i></a></li>

                                    </ul>
                                </div>
                                <img src="{{asset('images/team/seni.webp')}}" alt="images">
                                <a class="icon-top" href="#"></a>
                            </div>
                            <div class="info-staff">
                                <h3 class="section-heading-rubik-size20 text-pri2-color"> Seni Fitriani </h3>
                                <p class="section-desc-2"> CPO </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Our team -->



@endsection



@push('scripts')

@endpush
