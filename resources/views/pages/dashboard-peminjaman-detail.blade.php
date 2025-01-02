@extends('layouts.dashboard')


@section('title')
Perpustakaan Dashboard Peminjaman Detail Page
@endsection


@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">{{ $transactionDetail->transaction->code }}</h2>
            <p class="dashboard-subtitle">
                Detail Peminjaman
            </p>
        </div>
        <div class="dashboard-content" id="transactionDetails">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <img src="{{ Storage::url($transactionDetail->book->galleries->first()->foto) ?? '' }}"
                                        alt="" class="w-100 h-100"
                                        style="object-fit: contain; width: 100%; height: 100%;" />
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Judul Buku</div>
                                            <div class="product-subtitle">{{
                                                $transactionDetail->book->judul }}</div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Author</div>
                                            <div class="product-subtitle">
                                                {{ $transactionDetail->book->penulis->nama_penulis }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">
                                                Nama peminjam
                                            </div>
                                            <div class="product-subtitle">
                                                {{ $transactionDetail->transaction->user->nama }}
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="product-title">email</div>
                                            <div class="product-subtitle">{{
                                                $transactionDetail->transaction->user->email }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">nomor telpon</div>
                                            <div class="product-subtitle">
                                                {{ $transactionDetail->transaction->user->nomor_telp }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Jenis Kelamin</div>
                                            <div class="product-subtitle">
                                                {{ $transactionDetail->transaction->user->jenis_kelamin }}
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Alamat</div>
                                            <div class="product-subtitle">
                                                {{ $transactionDetail->transaction->user->alamat }}
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Status</div>
                                            <div class="product-subtitle 
                                        @if($transactionDetail->transaction->status === 'dipinjam')
                                            text-danger
                                        @elseif($transactionDetail->transaction->status === 'selesai')
                                            text-success
                                        @endif">
                                                {{ $transactionDetail->transaction->status }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mt-4">
                                    <h5>
                                        Informasi Peminjaman
                                    </h5>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Tanggal peminjaman</div>
                                            <div class="product-subtitle">
                                                {{
                                                Carbon\Carbon::parse($transactionDetail->transaction->tanggal_pinjam)->format('d
                                                F Y') }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Tanggal Pengembalian</div>
                                            <div class="product-subtitle">
                                                {{
                                                Carbon\Carbon::parse($transactionDetail->transaction->tanggal_kembali)->format('d
                                                F Y') }}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection