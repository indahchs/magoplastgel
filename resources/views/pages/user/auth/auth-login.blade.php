@extends('layouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Masuk</h4>
            @auth
                Saya sudah login
            @endauth
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
                action="{{ route('user.login.post') }}"
                class="needs-validation"
                novalidate="">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email"
                        type="email"
                        class="form-control"
                        name="email"
                        tabindex="1"
                        value="{{ old('email') ?? '' }}"
                        required
                        autofocus>
                        @csrf
                    <div class="invalid-feedback">
                        Please fill in your email
                    </div>
                    @if ($errors->has('email'))
                    <span class="text-danger mt-1">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password"
                            class="control-label">Password</label>
                        <div class="float-right">
                            {{-- <a href="#"
                                class="text-small">
                                Forgot Password?
                            </a> --}}
                        </div>
                    </div>
                    <input id="password"
                        type="password"
                        class="form-control"
                        name="password"
                        tabindex="2"
                        required>
                    <div class="invalid-feedback">
                        please fill in your password
                    </div>
                </div>

                {{-- <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox"
                            name="remember"
                            class="custom-control-input"
                            tabindex="3"
                            id="remember-me">
                        <label class="custom-control-label"
                            for="remember-me">Remember Me</label>
                    </div>
                </div> --}}

                <div class="form-group">
                    <button type="submit"
                        class="btn btn-primary btn-lg btn-block"
                        tabindex="4">
                        Masuk
                    </button>
                </div>
            </form>

        </div>
    </div>
    <div class="text-muted mt-5 text-center">
        Belum punya akun? <a href="{{ route('user.register') }}">Daftar</a>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
