@extends('layouts.app')

@section('title', $article->title)

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $article->title }}</h1>
            </div>

            <div class="section-body">
                <img src="/storage/{{ $article->thumbnail }}" class="img-fluid" alt="">
                <span class="content-info">
                    <a href="#" class="user">
                        BY {{ $article->user->name }}
                    </a>
                    <a href="#" class="date">
                        {{ $article->created_at }}
                    </a>
                </span>
                <div>
                    {!! $article->body !!}
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
