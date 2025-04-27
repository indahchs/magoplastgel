<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        @if (Auth::user()->role === 'admin')
            <div class="sidebar-brand" >
                <a href="#">Maggoplastgel</a>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                <li class="{{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link"
                        href="/"><i class="fa fa-gauge"></i> <span>Dashboard</span></a>
                </li>
                <li class="menu-header">Konten</li>
                <li class="nav-item dropdown {{ $type_menu === 'article' ? 'active' : '' }}">
                    <a href="#"
                        class="nav-link has-dropdown"><i class="fas fa-newspaper"></i><span>Artikel</span></a>
                    <ul class="dropdown-menu">
                        <li class='{{ Request::is('artikel/daftar-artikel') ? 'active' : '' }}'>
                            <a class="nav-link"
                                href="{{ url('/artikel/daftar-artikel') }}">Daftar Artikel</a>
                        </li>
                        <li class='{{ Request::is('artikel/tambah-artikel') ? 'active' : '' }}'>
                            <a class="nav-link"
                                href="{{ url('/artikel/tambah-artikel') }}">Tambah Artikel</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown {{ $type_menu === 'product' ? 'active' : '' }}">
                    <a href="#"
                        class="nav-link has-dropdown"><i class="fas fa-box-archive"></i><span>Produk</span></a>
                    <ul class="dropdown-menu">
                        <li class='{{ Request::is('produk/daftar-produk') ? 'active' : '' }}'>
                            <a class="nav-link"
                                href="{{ url('/produk/daftar-produk') }}">Daftar Produk</a>
                        </li>
                        <li class='{{ Request::is('produk/tambah-produk') ? 'active' : '' }}'>
                            <a class="nav-link"
                                href="{{ url('/produk/tambah-produk') }}">Tambah Produk</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-header">Pesanan</li>
                <li class="{{ Request::is('pesanan') ? 'active' : '' }}">
                    <a class="nav-link"
                        href="/pesanan"><i class="fa fa-cart-shopping"></i> <span>Daftar Pesanan</span></a>
                </li>
            </ul>

        @elseif (Auth::user()->role === 'user')
            <div class="sidebar-brand pt-4" >
                <img alt="image"
                src="{{ asset('img/avatar/avatar-2.png') }}"
                    class="rounded-circle mr-1" width="70">
                    <br>
                <a href="#">{{ Auth::user()->name }}</a>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">Profil Pengguna</li>
                <li class="{{ Request::is('user/profile') ? 'active' : '' }}">
                    <a class="nav-link"
                        href="{{ route('user.profile') }}"><i class="fas fa-user"></i> <span>Akun Saya</span></a>
                </li>
                <li class="{{ Request::is('user/profile/order') ? 'active' : '' }}">
                    <a class="nav-link"
                        href="{{ route('user.profile.order') }}"><i class="fas fa-cart-shopping"></i> <span>Pesanan Saya</span></a>
                </li>
            </ul>
            {{-- <div class="hide-sidebar-mini mt-4 mb-4 p-3">
                <a href="https://getstisla.com/docs"
                    class="btn btn-primary btn-lg btn-block btn-icon-split">
                    <i class="fas fa-right-from-bracket"></i> Logout
                </a>
            </div> --}}
        @endif


    </aside>
</div>
