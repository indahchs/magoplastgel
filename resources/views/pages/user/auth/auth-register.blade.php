@extends('layouts.auth')

@section('title', 'Register')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
        <link rel="stylesheet"
        href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Daftar</h4>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success alert-has-icon">
                    {{ session('status') }}
                </div>

            @elseif (session('error'))
                <div class="alert alert-danger alert-has-icon">
                    {{ session('error') }}
                </div>

            @endif
            <form method="POST"
                action="{{ route('user.register.store') }}"
                class="needs-validation">
                @csrf
                @method('POST')
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Nama Lengkap</label>
                            <input type="text"
                                class="form-control @error('name')
                                is-invalid
                                @enderror"
                                name="name"
                                value="{{ old('name') }}"
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
                                value="{{ old('email') }}"
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
                                placeholder=""
                                name="phone_number"
                                value="{{ old('phone_number') }}"
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
                                            <option value="{{ $province->name }}" >{{ $province->name }}</option>

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
                                value="{{ old('zip_code') }}"
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
                                required>{{ old('address_detail') }}</textarea>

                            @error('address_detail')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-12">
                        <label for="password"
                            class="d-block">Password</label>
                        <input id="password"
                            type="password"
                            class="form-control pwstrength @error('password')
                                is-invalid
                                @enderror"
                            data-indicator="pwindicator"
                            name="password">

                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <div id="pwindicator"
                            class="pwindicator">
                            <div class="bar"></div>
                            <div class="label"></div>
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="password2"
                            class="d-block">Password Confirmation</label>
                        <input id="password2"
                            type="password"
                            class="form-control @error('password_confirmation')
                                is-invalid
                                @enderror"
                            name="password_confirmation">

                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-primary btn-lg btn-block"
                            tabindex="4">
                            Daftar
                        </button>
                    </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/jquery.pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/auth-register.js') }}"></script>
    @include('components.script-laravolt')

@endpush
