@extends('layouts.admin')

@section('title')
Perpustakaan Admin Dashboard Page
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Admin Dashboard</h2>
            <p class="dashboard-subtitle">
                Perpustakaan Administrator
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Pengguna</div>
                            <div class="dashboard-card-subtitle">{{ $pengguna ?? 0 }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Buku</div>
                            <div class="dashboard-card-subtitle">{{ $buku ?? 0 }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Dipinjam</div>
                            <div class="dashboard-card-subtitle">{{ $dipinjam ?? 0 }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Pengembalian</div>
                            <div class="dashboard-card-subtitle">{{ $selesai ?? 0 }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 mt-2">
                    <h5 class="mb-3">Peminjaman terbaru</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Buku</th>
                                    <th scope="col">Judul & Author</th>
                                    <th scope="col">Peminjam</th>
                                    <th scope="col">Tanggal Peminjaman</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transaction_data as $transaction)
                                    <tr>
                                        <td>
                                            @if (isset($transaction->book->galleries) && $transaction->book->galleries->isNotEmpty())
                                                <img src="{{ Storage::url($transaction->book->galleries->first()->foto ?? 'default.jpg') }}"
                                                     alt="Book Image" width="70px" height="100px" style="background-size:unset" />
                                            @else
                                                <img src="/images/default-book.png" alt="Default Image" width="70px" height="100px" />
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            <div class="product-subtitle">{{ $transaction->book->judul ?? 'N/A' }}</div>
                                            <div class="product-title">{{ $transaction->book->penulis->nama_penulis ?? 'N/A' }}</div>
                                        </td>
                                        <td class="align-middle">
                                            {{ $transaction->transaction->user->nama ?? 'N/A' }}
                                        </td>
                                        <td class="align-middle">
                                            {{ isset($transaction->transaction->tanggal_pinjam) 
                                                ? Carbon\Carbon::parse($transaction->transaction->tanggal_pinjam)->format('d F Y') 
                                                : 'N/A' }}
                                        </td>
                                        <td class="align-middle">
                                            {{ $transaction->transaction->status ?? 'N/A' }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data peminjaman terbaru.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
    .navbar-perpus .nav-link {
    color:rgb(0, 0, 0) !important;
    transition: all 0.2s ease-in-out;
    }
    </style>
