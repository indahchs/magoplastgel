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
                <h1>Artikel</h1>
                <div class="section-header-button">
                    <a href="/artikel/tambah-artikel"
                        class="btn btn-primary">Buat Artikel</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Artikel</a></div>
                    <div class="breadcrumb-item">Semua artikel</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Artikel</h2>
                <p class="section-lead">
                    Anda dapat mengelola semua artikel, seperti mengedit, menghapus, dan lainnya.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active"
                                            data-toggle="tab"
                                            href="#all"
                                            role="tab"
                                            aria-controls="all"
                                            aria-selected="true">All <span class="badge badge-white">{{ $articles->total() }}</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            data-toggle="tab"
                                            href="#draft"
                                            role="tab"
                                            aria-controls="draft"
                                            aria-selected="false">Draft <span class="badge badge-primary">{{ $draft->total() }}</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            data-toggle="tab"
                                            href="#pending"
                                            role="tab"
                                            aria-controls="pending"
                                            aria-selected="false">Pending <span class="badge badge-primary">{{ $pending->total() }}</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            data-toggle="tab"
                                            href="#trash"
                                            role="tab"
                                            aria-controls="trash"
                                            aria-selected="false">Trash <span class="badge badge-primary">{{ $trash->total() }}</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Semua Artikel</h4>
                            </div>
                            <div class="card-body tab-content">
                                <div class="float-right">
                                    <form method="get">
                                        <div class="input-group">
                                            <input type="text"
                                                name="search"
                                                class="form-control"
                                                placeholder="Search"
                                                value="{{ request('search') ?? '' }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive tab-pane fade show active"
                                        id="all"
                                        role="tabpanel"
                                        aria-labelledby="home-tab3">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Author</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Status</th>
                                        </tr>
                                        @foreach ($articles as $article)
                                        <tr>
                                            <td>{{ $article->title }}
                                                <div class="table-links">
                                                    <a href="/artikel/edit-artikel/{{ $article->id }}">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="#"
                                                        onclick="
                                                            event.preventDefault();
                                                            document.getElementById('trash-article').action = '/artikel/hapus-artikel/{{ $article->id }}';
                                                            document.getElementById('trash-article').submit();
                                                        "
                                                        class="text-danger">Trash</a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#">{{ $article->articleCategory->name ?? '' ?? '' }}</a>
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <img alt="image"
                                                        src="{{ asset('img/avatar/avatar-5.png') }}"
                                                        class="rounded-circle"
                                                        width="35"
                                                        data-toggle="title"
                                                        title="">
                                                    <div class="d-inline-block ml-1">{{ $article->user->name ?? '' ?? '' }}</div>
                                                </a>
                                            </td>
                                            <td>{{ $article->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <div class="badge badge-{{ $article->status == 'publish' ? 'primary' : ($article->status == 'draft' ? 'danger' : 'warning') }} text-capitalize">{{ $article->status }}</div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </table>
                                </div>

                                <div class="table-responsive tab-pane fade"
                                        id="draft"
                                        role="tabpanel"
                                        aria-labelledby="draft">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Author</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Status</th>
                                        </tr>
                                        @foreach ($draft as $article)
                                        <tr>
                                            <td>{{ $article->title }}
                                                <div class="table-links">
                                                    <a href="/artikel/edit-artikel/{{ $article->id }}">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="#"
                                                        onclick="
                                                            event.preventDefault();
                                                            document.getElementById('trash-article').action = '/artikel/hapus-artikel/{{ $article->id }}';
                                                            document.getElementById('trash-article').submit();
                                                        "
                                                        class="text-danger">Trash</a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#">{{ $article->articleCategory->name ?? '' }}</a>
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <img alt="image"
                                                        src="{{ asset('img/avatar/avatar-5.png') }}"
                                                        class="rounded-circle"
                                                        width="35"
                                                        data-toggle="title"
                                                        title="">
                                                    <div class="d-inline-block ml-1">{{ $article->user->name ?? '' }}</div>
                                                </a>
                                            </td>
                                            <td>{{ $article->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <div class="badge badge-{{ $article->status == 'publish' ? 'primary' : ($article->status == 'draft' ? 'danger' : 'warning') }} text-capitalize">{{ $article->status }}</div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </table>
                                </div>

                                <div class="table-responsive tab-pane fade"
                                        id="pending"
                                        role="tabpanel"
                                        aria-labelledby="pending">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Author</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Status</th>
                                        </tr>
                                        @foreach ($pending as $article)
                                        <tr>
                                            <td>{{ $article->title }}
                                                <div class="table-links">
                                                    <a href="/artikel/edit-artikel/{{ $article->id }}">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="#"
                                                        onclick="
                                                            event.preventDefault();
                                                            document.getElementById('trash-article').action = '/artikel/hapus-artikel/{{ $article->id }}';
                                                            document.getElementById('trash-article').submit();
                                                        "
                                                        class="text-danger">Trash</a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#">{{ $article->articleCategory->name ?? '' }}</a>
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <img alt="image"
                                                        src="{{ asset('img/avatar/avatar-5.png') }}"
                                                        class="rounded-circle"
                                                        width="35"
                                                        data-toggle="title"
                                                        title="">
                                                    <div class="d-inline-block ml-1">{{ $article->user->name ?? '' }}</div>
                                                </a>
                                            </td>
                                            <td>{{ $article->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <div class="badge badge-{{ $article->status == 'publish' ? 'primary' : ($article->status == 'draft' ? 'danger' : 'warning') }} text-capitalize">{{ $article->status }}</div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </table>
                                </div>

                                <div class="table-responsive tab-pane fade"
                                        id="trash"
                                        role="tabpanel"
                                        aria-labelledby="trash">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Author</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Status</th>
                                        </tr>
                                        @foreach ($trash as $article)
                                        <tr>
                                            <td>{{ $article->title }}
                                                <div class="table-links">
                                                    <a href="#"
                                                    onclick="
                                                            event.preventDefault();
                                                            document.getElementById('restore-article').action = '/artikel/restore-artikel/{{ $article->id }}';
                                                            document.getElementById('restore-article').submit();
                                                        "
                                                        >Restore</a>
                                                    <div class="bullet"></div>
                                                    <a href="#"
                                                        class="text-danger confirm-delete" data-id="{{ $article->id }}">Delete</a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#">{{ $article->articleCategory->name ?? '' }}</a>
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <img alt="image"
                                                        src="{{ asset('img/avatar/avatar-5.png') }}"
                                                        class="rounded-circle"
                                                        width="35"
                                                        data-toggle="title"
                                                        title="">
                                                    <div class="d-inline-block ml-1">{{ $article->user->name ?? '' }}</div>
                                                </a>
                                            </td>
                                            <td>{{ $article->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <div class="badge badge-{{ $article->status == 'publish' ? 'primary' : ($article->status == 'draft' ? 'danger' : 'warning') }} text-capitalize">{{ $article->status }}</div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </table>
                                </div>

                                <div class="float-right">
                                    {{-- <nav>
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
                                    </nav> --}}
                                    {{ $articles->links('pagination::bootstrap-5') }}
                                </div>
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
   <form id="restore-article" action="/artikel/restore-artikel/" method="post"
        style="display: none;">
        @csrf
        @method('PUT')
   </form> 
   <form id="delete-article" action="/artikel/restore-artikel/" method="post"
        style="display: none;">
        @csrf
        @method('PUT')
   </form>     
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>

    <!-- Script Fort This page -->
    <script src="{{ asset('js/page/admin/article-list.js') }}"></script>
@endpush
