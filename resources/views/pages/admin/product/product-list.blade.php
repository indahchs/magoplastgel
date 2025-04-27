@extends('layouts.app')

@section('title', 'Daftar Artikel')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">

        <!-- CSS Libraries -->
    <link rel="stylesheet"
    href="{{ asset('library/izitoast/dist/css/iziToast.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Produk</h1>
                <div class="section-header-button">
                    <a href="/produk/tambah-produk"
                        class="btn btn-primary">Tambah Produk</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Produk</a></div>
                    <div class="breadcrumb-item">Semua produk</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Produk</h2>
                <p class="section-lead">
                    Anda dapat mengelola semua produk, seperti mengedit, menghapus, dan lainnya.
                </p>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Semua Produk</h4>
                            </div>
                            <div class="card-body tab-content">
                                <div class="float-right">
                                    <form method="get">
                                        <div class="input-group">
                                            <input type="text"
                                                name="search"
                                                class="form-control"
                                                placeholder="Search"
                                                value="{{ request()->search ?? '' }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Berat</th>
                                            <th>Stok</th>
                                            <th class="text-center">Status</th>
                                            <th></th>
                                        </tr>
                                        @foreach ($products as $product)
                                        <tr>
                                            <td class="d-flex">
                                                <figure class="rounded border mr-2">
                                                    <img src="{{ isset($product->productImages()->first()->path) ? "/storage/" . $product->productImages()->first()->path : asset('images/product/empty-image.png') }}" class="product-image" alt="...">
                                                </figure>
                                                <div>
                                                    <span class="fw-bold">{{ $product->name }}</span>
                                                    <div class="table-links">
                                                        <a href="#">View</a>
                                                        <div class="bullet"></div>
                                                        <a href="/produk/edit-produk/{{ $product->id }}">Edit</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle rupiah">
                                                {{ $product->price }}
                                            </td>
                                            <td>
                                                {{ $product->weight }}
                                            </td>
                                            <td>
                                                {{ $product->stock }}
                                            </td>
                                            <td>
                                                {{-- <div class="badge badge-{{ $product->status ? "success" : "danger" }}">{{ $product->status ? "Aktif" : "Non-aktif" }}</div> --}}
                                                <label class="custom-switch mt-2">
                                                    <input type="checkbox" 
                                                        name="custom-switch-checkbox" 
                                                        class="custom-switch-input" 
                                                        @checked($product->status)
                                                        onchange="
                                                            event.preventDefault();
                                                            document.getElementById('status-product').action = '/produk/{{ $product->status ? 'nonaktif' : 'aktif' }}-produk/{{ $product->id }}';
                                                            document.getElementById('status-product').submit();"
                                                        >
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">{{ $product->status ? "Aktif" : "Non-aktif" }}</span>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="dropdown d-inline">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Aksi
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        <a class="dropdown-item has-icon" href="/produk/edit-produk/{{ $product->id }}"><i class="fas fa-pen"></i> Edit</a>
                                                        <a class="dropdown-item has-icon text-danger remove-product" href="#" data-id="{{ $product->id }}"><i class="fas fa-trash"></i> Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>

                                {{-- <div class="float-right">
                                    <nav>
                                        <ul class="pagination">
                                            <li class="page-item disabled">
                                                <a class="page-link"
                                                    href="#"
                                                    aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link"
                                                    href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link"
                                                    href="#">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link"
                                                    href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link"
                                                    href="#"
                                                    aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <form id="status-product" action="" method="post"
        style="display: none;">
        @csrf
        @method('PUT')
   </form>   
    <form id="delete-product-form" action="" method="post"
          style="display: none;">
          @csrf
          @method('DELETE')
     </form>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
    <script src="{{ asset('js/rupiah.js') }}"></script>
    <script src="{{ asset('js/page/admin/product-list.js') }}"></script>
@endpush
