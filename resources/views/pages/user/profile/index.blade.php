@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Profile</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Profile</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Hi, {{ Auth::user()->name }}</h2>
                <p class="section-lead">
                    Kamu bisa mengganti informasi data diri di halaman ini.
                </p>

                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-5">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <img alt="image"
                                    src="{{ asset('img/avatar/avatar-1.png') }}"
                                    class="rounded-circle profile-widget-picture">
                            </div>
                            <div class="profile-widget-description">
                                <div class="profile-widget-name">{{ Auth::user()->name }}<div
                                        class="text-muted d-inline font-weight-normal">
                                        <div class="slash"></div> {{ Auth::user()->email }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <h6>No. Hp :</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ Auth::user()->phone_number }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Alamat Lengkap :</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ Auth::user()->address_detail }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Kelurahan :</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ Auth::user()->kelurahan }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Kecamatan :</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ Auth::user()->kecamatan }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Kota :</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ Auth::user()->city }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Provinsi :</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ Auth::user()->province }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Kode Pos :</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ Auth::user()->zip_code }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- Edit Profile --}}
                    <div class="col-12 col-md-12 col-lg-7">
                        <div class="card">
                            <form method="POST"
                                action="{{ route('user.profile.update') }}"
                                class="needs-validation">
                                @csrf
                                @method('PUT')
                                <div class="card-header">
                                    <h4>Ubah Profil</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Nama Lengkap</label>
                                            <input type="text"
                                                class="form-control @error('name')
                                                is-invalid
                                                @enderror"
                                                name="name"
                                                value="{{ optional(Auth::user())->name }}"
                                                required="">

                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Email</label>
                                            <input type="email"
                                                class="form-control @error('email')
                                                is-invalid
                                                @enderror"
                                                name="email"
                                                value="{{ optional(Auth::user())->email }}"
                                                required="">

                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>No. Hp (62)</label>
                                            <input type="number"
                                                class="form-control @error('phone_number')
                                                is-invalid
                                                @enderror"
                                                placeholder="628956789547"
                                                name="phone_number"
                                                value="{{ optional(Auth::user())->phone_number }}"
                                                required="">

                                            @error('phone_number')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Provinsi</label>
                                                <select class="form-control select2" name="province" id="provinsi">
                                                    <option value="">-- Pilih --</option>
                                                    @if (isset($provinces))
                                                        @foreach ($provinces as $province)
                                                            <option value="{{ $province->name }}" {{ Str::upper(Auth::user()->province) === $province->name ? 'selected' : '' }}>{{ $province->name }}</option>

                                                        @endforeach
                                                    @endif
                                                </select>
                                                    @error('province')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Kota</label>
                                                <select class="form-control select2" name="city" id="kota">

                                                </select>
                                                    @error('city')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Kecamatan</label>
                                                <select class="form-control select2" name="kecamatan" id="kecamatan">

                                                </select>
                                                    @error('kecamatan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Kelurahan</label>
                                                <select class="form-control select2" name="kelurahan" id="kelurahan">

                                                </select>
                                                    @error('kelurahan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Kode Pos</label>
                                            <input type="number"
                                                class="form-control @error('zip_code')
                                                is-invalid
                                                @enderror"
                                                name="zip_code"
                                                value="{{ Auth::user()->zip_code }}"
                                                required="">

                                            @error('zip_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Alamat Lengkap</label>
                                            <textarea class="form-control  @error('address_detail')
                                                is-invalid
                                                @enderror"
                                                name="address_detail"
                                                data-height="100"
                                                style="height: 100px;"
                                                required>{{ Auth::user()->address_detail }}</textarea>

                                            @error('address_detail')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>


    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>

    {{-- Laravols Js --}}
    {{-- <script>

        // Default data form auth user
        var defaultProvince = '{{ Auth::user() ? Auth::user()->province : null }}';
        var defaultCity = '{{ Auth::user() ? Auth::user()->city : null }}';
        var defaultDistrict = '{{ Auth::user() ? Auth::user()->kecamatan : null }}';
        var defaultVillage = '{{ Auth::user() ? Auth::user()->kelurahan : null }}';

        if (defaultProvince) {
            // Load cities and then load districts based on the selected city
            onChangeSelect('{{ route("cities") }}', defaultProvince, 'kota', defaultCity, function() {
                // After cities are loaded, load districts
                onChangeSelect('{{ route("districts") }}', defaultCity, 'kecamatan', defaultDistrict, function() {
                    // After districts are loaded, load villages
                    onChangeSelect('{{ route("villages") }}', defaultDistrict, 'kelurahan', defaultVillage);
                });
            });
        }

        function onChangeSelect(url, name, tag, selected = null, callback = null) {
            // send ajax request to get the cities of the selected province and append to the select tag
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    name: name
                },
                success: function (data) {
                    $('#' + tag).empty();
                    $('#' + tag).append('<option>-- Pilih --</option>');
                    $.each(data, function (key, value) {
                        $('#' + tag).append('<option value="' + value + '"'+ (value == selected ? ' selected' : '') + '>' + value + '</option>');
                    });
                     // If a callback is provided, execute it after the data is loaded
                    if (callback) {
                        callback();
                    }
                }
            });
        }

        $(function () {
            $('#provinsi').on('change', function () {
                onChangeSelect('{{ route("cities") }}', $(this).val(), 'kota', null, function() {
                    // Clear kecamatan and kelurahan when province changes
                    $('#kecamatan').empty().append('<option>-- Pilih --</option>');
                    $('#kelurahan').empty().append('<option>-- Pilih --</option>');
                });
            });

            $('#kota').on('change', function () {
                onChangeSelect('{{ route("districts") }}', $(this).val(), 'kecamatan', null, function() {
                    // Clear kelurahan when city changes
                    $('#kelurahan').empty().append('<option>-- Pilih --</option>');
                });
            });

            $('#kecamatan').on('change', function () {
                onChangeSelect('{{ route("villages") }}', $(this).val(), 'kelurahan');
            });
        });
    </script> --}}

    @include('components.script-laravolt')
@endpush
