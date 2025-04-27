@extends('layouts.app')

@section('title', 'Buat Artikel')

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
                    <a href="/artikel/daftar-artikel"
                        class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>{{ isset($article) ? "Edit Artikel" : "Buat Artikel Baru" }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Artikel</a></div>
                    <div class="breadcrumb-item">{{ isset($article) ? "Edit Artikel" : "Buat Artikel Baru" }}</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">{{ isset($article) ? "Edit Artikel" : "Buat Artikel Baru" }}</h2>
                <p class="section-lead">
                    {{ isset($article) ? "Di halaman ini Anda dapat mengubah data atau konten dari artikel" : "Di halaman ini Anda dapat membuat artikel baru dan mengisi semua kolom." }}
                </p>

                <div class="row">
                    <div class="col-12">
                        <form class="card" method="post" action="{{ isset($article) ? "/artikel/edit/" . $article->id : "/artikel" }}" enctype="multipart/form-data">
                            @csrf
                            @isset($article)
                                @method('PUT')
                            @endisset
                            <div class="card-header">
                                <h4>{{ isset($article) ? "Edit Artikel" : "Mulai Tulis Artikel" }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text"
                                            class="form-control" 
                                            name="title"
                                            value="{{ isset($article) ? $article->title : "" }}"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="article_category_id" id="category-select">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @selected(isset($article) && $article->article_category_id == $category->id)>{{ $category->name }}</option>
                                            @endforeach
                                            <option value="new">+ Tambah Kategori Baru</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Konten</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="summernote" name="body">{{ isset($article) ? $article->body : "" }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview"
                                            class="image-preview" style="{{ isset($article) ? "background-image: url('/storage/$article->thumbnail'); background-size: cover; background-position: center" : ""}}">
                                            <label for="image-upload"
                                                id="image-label">Pilih Gambar</label>
                                            <input type="file"
                                                name="thumbnail"
                                                id="image-upload" 
                                                accept="image/png, image/gif, image/jpeg, image/jpg"
                                                {{ isset($article) ? "" : "required" }}/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tags</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text"
                                            class="form-control inputtags" 
                                            name="tags"
                                            value="{{ isset($article) ? $article->tags : "" }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="status">
                                            <option value="publish" @selected(isset($article) && $article->status == "publish")>Publish</option>
                                            <option value="draft" @selected(isset($article) && $article->status == "draft")>Draft</option>
                                            <option value="pending" @selected(isset($article) && $article->status == "pending")>Pending</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">{{ isset($article) ? "Edit" : "Buat" }} Artikel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" tabindex="-1" id="new-category-modal" aria-modal="true" role="dialog">       
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">         
            <div class="modal-content">           
                <div class="modal-header">             
                    <h5 class="modal-title">Tambah Kategori</h5>             
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">               
                        <span aria-hidden="true">×</span>             
                    </button>           
                </div>           
                <div class="modal-body">           
                    <form class="" >
                        <p>Tambahkan kategori baru.</p>
                        <div class="form-group">
                            <label>Nama kategori</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="" id="new-category" name="name">
                            </div>
                        </div>
                        <button class="d-none" id="fire-modal-5-submit"></button>
                    </form>
                </div>           
                <div class="modal-footer bg-whitesmoke">           
                    <button type="submit" class="btn btn-primary btn-shadow" id="add-category-btn">Simpan</button>
                </div>         
            </div>       
        </div>    
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/upload-preview/upload-preview.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-post-create.js') }}"></script>
    <script src="{{ asset('js/page/admin/article-create-update.js') }}"></script>
@endpush
