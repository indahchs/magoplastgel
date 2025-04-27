@extends('layouts.app')

@section('title', 'Daftar Pesanan')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/izitoast/dist/css/iziToast.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Daftar Pesanan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Daftar pesanan</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Pesanan</h2>
                <p class="section-lead">
                    Anda dapat mengelola semua pesanan.
                </p>

                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active"
                                            data-toggle="tab"
                                            href="#pending"
                                            role="tab"
                                            aria-controls="pending"
                                            aria-selected="true">Belum dibayar<span class="badge badge-primary">{{ isset($orders['pending']) ? $orders['pending']->count() : 0 }}</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            data-toggle="tab"
                                            href="#paid"
                                            role="tab"
                                            aria-controls="paid"
                                            aria-selected="false">Diproses <span class="badge badge-primary">{{ isset($orders['paid']) ? $orders['paid']->count() : 0 }}</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            data-toggle="tab"
                                            href="#shipped"
                                            role="tab"
                                            aria-controls="shipped"
                                            aria-selected="false">Dalam pengiriman <span class="badge badge-primary">{{ isset($orders['shipped']) ? $orders['shipped']->count() : 0 }}</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            data-toggle="tab"
                                            href="#arrived"
                                            role="tab"
                                            aria-controls="arrived"
                                            aria-selected="false">Tiba ditujuan <span class="badge badge-primary">{{ isset($orders['arrived']) ? $orders['arrived']->count() : 0 }}</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body p-0 tab-content">
                        <div class="table-responsive tab-pane fade show active"
                                        id="pending"
                                        role="tabpanel"
                                        aria-labelledby="pending">
                            <x-order.table :orders="$orders['pending'] ?? []"/>
                        </div>

                        <div class="table-responsive tab-pane fade"
                                        id="paid"
                                        role="tabpanel"
                                        aria-labelledby="paid">
                            <x-order.table :orders="$orders['paid'] ?? []"/>
                        </div>

                        <div class="table-responsive tab-pane fade"
                                        id="shipped"
                                        role="tabpanel"
                                        aria-labelledby="shipped">
                            <x-order.table :orders="$orders['shipped'] ?? []"/>
                        </div>

                        <div class="table-responsive tab-pane fade"
                                        id="arrived"
                                        role="tabpanel"
                                        aria-labelledby="arrived">
                            <x-order.table :orders="$orders['arrived'] ?? []"/>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <div class="modal fade" tabindex="-1" id="tracking-modal" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lacak Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="activities">

                        <div class="activity">
                            <div class="activity-icon bg-primary shadow-primary text-white">
                                <i class="fas fa-trash"></i>
                            </div>
                            <div class="activity-detail">
                                <div class="mb-2">
                                    <span class="text-job">Yesterday</span>
                                    <span class="bullet"></span>
                                    <a class="text-job" href="#">View</a>
                                    <div class="dropdown float-right">
                                        <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                        <div class="dropdown-menu">
                                            <div class="dropdown-title">Options</div>
                                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i> Detail</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item has-icon text-danger trigger--fire-modal-5" data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?" data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i>
                                                Archive</a>
                                        </div>
                                    </div>
                                </div>
                                <p>Removing task "Delete all unwanted selectors in CSS files".</p>
                            </div>
                        </div>
                        <div class="activity">
                            <div class="activity-icon bg-primary shadow-primary text-white">
                                <i class="fas fa-trash"></i>
                            </div>
                            <div class="activity-detail">
                                <div class="mb-2">
                                    <span class="text-job">2024-08-31 11:27</span>

                                </div>
                                <p>Manifes</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/rupiah.js') }}"></script>
    <script src="{{ asset('js/page/admin/order-list.js') }}"></script>

@endpush
