@extends('layouts.app')

@section('title', 'Tambah Produk')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet"

        href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="/produk/daftar-produk"
                        class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>{{ isset($product) ? "Edit Produk" : "Tambah Produk Baru" }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Produk</a></div>
                    <div class="breadcrumb-item">{{ isset($product) ? "Edit Produk" : "Tambah Produk Baru" }}</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">{{ isset($product) ? "Edit Produk" : "Tambah Produk Baru" }}</h2>
                <p class="section-lead">
                    {{ isset($product) ? "Di halaman ini Anda dapat mengubah data produk" : "Di halaman ini Anda dapat menambah produk baru dan mengisi semua kolom." }}
                </p>

                <div class="row">
                    <div class="col-12">
                        <form class="card" id="form" method="post" action="{{ isset($product) ? "/produk/edit/" . $product->id : "/produk" }}" enctype="multipart/form-data">
                            @csrf
                            @isset($product)
                                @method('PUT')
                            @endisset
                            <div class="card-header">
                                
                            </div>
                            <div class="card-body">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Produk</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text"
                                            class="form-control" 
                                            name="name"
                                            value="{{ isset($product) ? $product->name : "" }}"
                                            required>
                                        @error('name')
                                        <div class="invalid-feedback">
                                            Nama produk tidak valid
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Produk</label>
                                    <div class="col-sm-12 col-md-7 d-flex justify-content-start flex-wrap">
                                        
                                        @if (isset($product))
                                            @foreach ($product->productImages as $index => $image)
                                                @if ($index == 0)
                                                <div id="image-preview-{{ $index + 1 }}" class="image-preview image-preview-product position-relative"
                                                style="background-image: url('/storage/{{ $image->path }}'); background-size: cover; background-position: center;">
                                                    <button type="button" class="btn btn-light position-absolute z-15 top-50 start-50 delete-prev-image"><i class="fas fa-trash"></i></button>
                                                    <label for="image-upload-{{ $index + 1 }}" id="image-label">Foto {{ $index + 1 }}</label>
                                                    <input type="file" name="images[{{ $image->id }}]" class="change-image" id="image-upload-{{ $index + 1 }}" 
                                                        accept="image/png, image/gif, image/jpeg, image/jpg"
                                                        oninvalid="this.setCustomValidity('Foto 1 wajib diisi')" 
                                                        oninput="this.setCustomValidity('')"
                                                        />
                                                    <input type="checkbox" class="delete-image-list" name="delete_images[]" value="{{ $image->id }}" id="">
                                                </div>
                                                @else
                                                <div id="image-preview-{{ $index + 1 }}" class="image-preview image-preview-product position-relative"
                                                style="background-image: url('/storage/{{ $image->path }}'); background-size: cover; background-position: center;">
                                                    <button type="button" class="btn btn-light position-absolute z-15 top-50 start-50 delete-prev-image"><i class="fas fa-trash"></i></button>
                                                    <label for="image-upload-{{ $index + 1 }}" id="image-label">Foto {{ $index + 1 }}</label>
                                                    <input type="file" name="images[{{ $image->id }}]" class="change-image" id="image-upload-{{ $index + 1 }}" 
                                                        accept="image/png, image/gif, image/jpeg, image/jpg"/>
                                                    <input type="checkbox" class="delete-image-list" name="delete_images[]" value="{{ $image->id }}" id="">
                                                </div>
                                                @endif
                                            @endforeach

                                            {{-- Slot kosong jika gambar kurang dari 5 --}}
                                            @for ($i = $product->productImages()->count() + 1; $i <= 5; $i++)
                                                <div id="image-preview-{{ $i }}" class="image-preview image-preview-product">
                                                    <label for="image-upload-{{ $i }}" id="image-label">Foto {{ $i }}</label>
                                                    <input type="file" name="new_images[]" id="image-upload-{{ $i }}" 
                                                        accept="image/png, image/gif, image/jpeg, image/jpg"/>
                                                </div>
                                            @endfor
                                        @else
                                            {{-- Jika create, tampilkan form untuk upload gambar baru --}}
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i == 1)
                                                <div id="image-preview-{{ $i }}" class="image-preview image-preview-product">
                                                    <label for="image-upload-{{ $i }}" id="image-label">Foto {{ $i }}</label>
                                                    <input type="file" name="images[]" id="image-upload-{{ $i }}" 
                                                        accept="image/png, image/gif, image/jpeg, image/jpg"
                                                        oninvalid="this.setCustomValidity('Foto 1 wajib diisi')" 
                                                        oninput="this.setCustomValidity('')"
                                                        required/>
                                                </div>
                                                @else
                                                <div id="image-preview-{{ $i }}" class="image-preview image-preview-product">
                                                    <label for="image-upload-{{ $i }}" id="image-label">Foto {{ $i }}</label>
                                                    <input type="file" name="images[]" id="image-upload-{{ $i }}" 
                                                        accept="image/png, image/gif, image/jpeg, image/jpg"/>
                                                </div>
                                                @endif
                                            @endfor
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi Produk</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="form-control"
                                            data-height="150"
                                            name="description"
                                            required="">{{ isset($product) ? $product->description : "" }}</textarea>
                                        @error('description')
                                        <div class="invalid-feedback">
                                            Nama produk tidak valid
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga Produk</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Rp
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control currency"
                                                name="price"
                                                min="1"
                                                value="{{ isset($product) ? $product->price : "" }}">
                                        </div>
                                        @error('price')
                                        <div class="invalid-feedback">
                                            Harga produk tidak valid
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Stok Produk</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number"
                                            class="form-control" 
                                            name="stock"
                                            min="1"
                                            value="{{ isset($product) ? $product->stock : "" }}"
                                            required>
                                        @error('stock')
                                        <div class="invalid-feedback">
                                            Stok produk tidak valid
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Berat Produk</label>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="input-group">
                                            <input type="number"
                                                class="form-control"
                                                name="weight"
                                                min="1"
                                                value="{{ isset($product) ? $product->weight : "" }}">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    gram
                                                </div>
                                            </div>
                                        </div>
                                        @error('weight')
                                        <div class="invalid-feedback">
                                            Berat produk tidak valid
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ukuran Produk </br> (optional)</label>
                                    <div class="col-sm-12 col-md-2 mb-4">
                                        <div class="input-group">
                                            <input type="number"
                                                class="form-control"
                                                placeholder="Panjang"
                                                name="length"
                                                min="1"
                                                value="{{ isset($product) ? $product->length : "" }}">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    cm
                                                </div>
                                            </div>
                                            @error('length')
                                            <div class="invalid-feedback">
                                                Panjang produk tidak valid
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 mb-4">
                                        <div class="input-group">
                                            <input type="number"
                                                class="form-control"
                                                placeholder="Lebar"
                                                name="width"
                                                min="1"
                                                value="{{ isset($product) ? $product->width : "" }}">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    cm
                                                </div>
                                            </div>
                                            @error('width')
                                            <div class="invalid-feedback">
                                                Lebar produk tidak valid
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-2 mb-4">
                                        <div class="input-group">
                                            <input type="number"
                                                class="form-control"
                                                placeholder="Tinggi"
                                                name="height"
                                                min="1"
                                                value="{{ isset($product) ? $product->height : "" }}">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    cm
                                                </div>
                                            </div>
                                            @error('height')
                                            <div class="invalid-feedback">
                                                Tinggi produk tidak valid
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Produk</label>
                                    <div class="col-sm-12 col-md-7">
                                        <label class="mt-2">
                                            <input type="checkbox"
                                                name="status"
                                                class="custom-switch-input"
                                                value="1"
                                                @if (isset($product))
                                                    @checked($product->status)
                                                @else
                                                    @checked(true)
                                                @endif>
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description"></span>
                                        </label>
                                        @error('status')
                                        <div class="invalid-feedback">
                                            Status produk tidak valid
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary" type="submit">{{ isset($product) ? "Edit" : "Tambah" }} Produk</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/upload-preview/upload-preview.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/admin/product-create-update.js') }}"></script>
@endpush
