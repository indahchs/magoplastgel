<!-- header -->
<div class="flat-header-box">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <!-- header -->
                <header id="header" class="header bg-color mt-2">
                    <div class="container">
                        <div class="row">
                            <div class="header-wrap-home1">
                                <div class="col-md-2 ">
                                    <div class="inner-header">
                                        <div class="logo-header">
                                            <a href="{{ route('user.home')  }}" title="">
                                                <img src="{{ route('user.home')  }}/assets/images/logo/Logo-x.png" alt="images">
                                                {{-- <img src="{{ u('/images/logo/Logo-x.png') }}" alt="images"> --}}
                                            </a>
                                        </div>
                                        <!-- /logo -->

                                        <div class="btn-menu">
                                            <span></span>
                                        </div>
                                        <!-- /mobile menu button -->
                                    </div>
                                </div>

                                <div class="col-md-8 justify-content-center" style="">
                                    <div class="" style="">
                                        <nav id="mainnav" class="mainnav" style="">
                                            <ul class="menu">
                                                <li>
                                                    <a href="{{ route('user.home') }}" class="{{ Route::is('/') ? 'active' : '' }}" title="">Beranda</a>
                                                </li>
                                                <li class="menu-item-has-children">
                                                    <a href="{{ route('user.about-us') }}" class="{{ Route::is('about-us') ? 'active' : '' }}" title="">Tentang Kami</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="{{ route('user.about-us') }}" class="{{ Route::is('about-us') ? 'active' : '' }}" title="">Tentang Kami</a></li>
                                                        <li><a href="{{ route('user.team') }}" class="{{ Route::is('team') ? 'active' : '' }}" title="">Tim</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.product') }}" class="{{ Route::is('product') ? 'active' : ' '  }} " title="">Produk</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.article') }}" class="{{ Route::is('artikel') ? 'active' : '' }}" title="">Artikel</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.contact-us') }}" class="{{ Route::is('contact-us') ? 'active' : ' '  }} " title="">Kontak Kami</a>
                                                </li>
                                                @if (!Auth::user())
                                                    <li class="profile-navbar">
                                                        <a href="{{ route('user.login.index') }}" class="{{ Route::is('') ? 'active' : ' '  }} " title="">Masuk</a>
                                                    </li>
                                                @else
                                                    <li class="menu-item-has-children profile-navbar">
                                                        <a href="#" class="{{ Route::is('about-us') ? 'active' : '' }}" title="">Hi, {{ Auth::user()->name }}</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="{{ route('user.profile') }}" class="{{ Route::is('about-us') ? 'active' : '' }}" title="">Profile</a></li>
                                                            <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout</a></li>
                                                            <form id="logout-form"
                                                                action="{{ route('user.logout') }}"
                                                                method="POST" style="display: none">
                                                                @csrf
                                                                @method('POST')
                                                                <button type="submit">Logout</button>
                                                            </form>
                                                        </ul>
                                                    </li>
                                                @endif

                                            </ul>
                                        </nav>
                                    </div>
                                </div>

                                <div class="col-md-2 header-profile" >
                                    <div class="site-header-right " >
                                        @if (!Auth::user())
                                            <div class="button d-flex" >
                                                <a href="{{ route('user.login.index') }}" class=" ">Masuk</a>
                                            </div>
                                        @else
                                            <div class="button d-flex ">
                                                <div class="dropdown">
                                                    <button class="btn btn-default dropdown-toggle " type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="border: none">
                                                        <p class="text-custom-primary header-user-name">Hi, {{ Auth::user()->name }}<span class="caret" style="margin-left: 10px"></span></p>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                        <li><a href="{{ route('user.profile') }}">Profil</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li>
                                                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout</a>
                                                        </li>
                                                        <form id="logout-form"
                                                            action="{{ route('user.logout') }}"
                                                            method="POST" style="display: none">
                                                            @csrf
                                                            @method('POST')
                                                            <button type="submit">Logout</button>
                                                        </form>
                                                    </ul>
                                                </div>
                                            </div>


                                        @endif

                                    </div>
                                    <!-- header right -->
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
            </div>
        </div>
    </div>
</div>
<!-- /header -->


