@extends('layouts.app')

@section('title', 'Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/izitoast/dist/css/iziToast.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Produk</h4>
                            </div>
                            <div class="card-body">
                                {{ $num_products }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Artikel</h4>
                            </div>
                            <div class="card-body">
                                {{ $num_articles }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Penjualan</h4>
                            </div>
                            <div class="card-body">
                                {{ $num_orders }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pengguna</h4>
                            </div>
                            <div class="card-body">
                                {{ $num_users }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistics</h4>
                            <div class="card-header-action">
                                <ul class="nav nav-pills">
                                    <li class="nav-item btn-group">
                                        <a class="nav-link"
                                            data-toggle="tab"
                                            role="tab"
                                            id="month-chart"
                                            aria-selected="true">Month</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active"
                                            data-toggle="tab"
                                            role="tab"
                                            id="week-chart"
                                            aria-selected="true">Week</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="orderChart"
                                height="182"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pembelian Terbaru</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                @foreach ($recent_orders as $order)
                                <li class="media">
                                    <img class="rounded-circle mr-{{ $loop->index+1 }}"
                                        width="50"
                                        src="{{ asset("img/avatar/avatar-" . $loop->index+1 .".png") }}"
                                        alt="avatar">
                                    <div class="media-body">
                                        <div class="text-primary float-right">{{ $order->created_at->diffForHumans() }}</div>
                                        <div class="media-title">{{ $order->user->name }}</div>
                                        <span class="text-small text-muted">Membeli <span class="font-weight-bold">{{ $order->orderItems[0]->quantity ?? "" }}</span> buah <span class="font-weight-bold">{{ $order->orderItems[0]->product->name ?? "Produk dihapus" }}</span></span>
                                    </div>
                                </li>    
                                @endforeach
                                
                            </ul>
                            <div class="pt-1 pb-1 text-center">
                                <a href="/pesanan"
                                    class="btn btn-primary btn-lg btn-round">
                                    View All
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-md-12 col-12 col-sm-12">
                    <form method="post"
                        class="needs-validation"
                        novalidate=""
                        action="/artikel/tambah-draft"
                        >
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4>Quick Draft</h4>
                            </div>
                            <div class="card-body pb-0">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text"
                                        name="title"
                                        class="form-control"
                                        required>
                                    <div class="invalid-feedback">
                                        Masukan judul
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Kontent</label>
                                    <textarea class="summernote-simple" name="body" required></textarea>
                                </div>
                            </div>
                            <div class="card-footer pt-0">
                                <button class="btn btn-primary">Simpan Draft</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-7 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Artikel Terbaru</h4>
                            <div class="card-header-action">
                                <a href="/artikel/daftar-artikel"
                                    class="btn btn-primary">View All</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table-striped mb-0 table">
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th>Penulis</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recent_articles as $article)                                            
                                        <tr>
                                            <td>
                                                {{ $article->title }}
                                            </td>
                                            <td>
                                                <a href="#"
                                                    class="font-weight-600"><img
                                                        src="{{ asset('img/avatar/avatar-1.png') }}"
                                                        alt="avatar"
                                                        width="30"
                                                        class="rounded-circle mr-1"> {{ $article->user->name ?? '' }}</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-action mr-1" href="/artikel/edit-artikel/{{ $article->id }}"
                                                    data-toggle="tooltip"
                                                    title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger btn-action"
                                                    data-toggle="tooltip"
                                                    title="Delete"
                                                    data-confirm="Apakah Anda yakin?|Buang ke tempat sampah?"
                                                    data-confirm-yes="
                                                            document.getElementById('trash-article').action = '/artikel/hapus-artikel/{{ $article->id }}';
                                                            document.getElementById('trash-article').submit();
                                                    "><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <form id="trash-article" action="/artikel/hapus-artikel/" method="post"
        style="display: none;">
        @csrf
        @method('PUT')
   </form> 
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="{{ asset('library/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
    <script src="{{ asset('js/page/admin/dashboard.js') }}"></script>
    
@endpush
