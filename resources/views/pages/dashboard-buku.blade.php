@extends('layouts.dashboard')


@section('title')
Perpustakaan Dashboard Buku Page
@endsection

@push('addon-style')
<style>
    .product-image-container {
        width: 100%;
        height: 0;
        padding-bottom: 100%;
        position: relative;
        overflow: hidden;
    }

    .product-image {
        width: 100%;
        height: 100%;
        position: absolute;
        object-fit: contain;
    }
</style>
@endpush

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Buku saya</h2>
            <p class="dashboard-subtitle">
                Reading, Learning, Growing.
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('category') }}" class="btn btn-primary">pinjam buku baru</a>
                </div>
            </div>
            <div class="row mt-4">
                @foreach ($transaction_data as $transaction)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a class="card card-dashboard-product d-block"
                        href="{{ route('dashboard-buku-detail', ['id' =>$transaction->book->id]) }}">
                        <div class="card-body">
                            <div class="product-image-container">
                                <img src="{{ Storage::url($transaction->book->galleries->first()->foto) ?? '' }}"
                                    class="product-image" alt="" class="w-100 mb-2" />
                            </div>
                            <div class="product-title">{{ $transaction->book->judul }}</div>
                            <div class="product-category">by {{ $transaction->book->penulis->nama_penulis
                                }}</div>
                        </div>
                    </a>
                    <a href="{{ route('dashboard-buku-baca', ['id' =>$transaction->book->id]) }}"
                        class="btn btn-primary" style="width: 100%; margin-top: 10px; display: block;">Baca</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection