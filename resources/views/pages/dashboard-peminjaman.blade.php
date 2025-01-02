@extends('layouts.dashboard')


@section('title')
Perpustakaan Dashboard Peminjaman Page
@endsection


@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Peminjaman</h2>
            <p class="dashboard-subtitle">
                Big result start from the small one
            </p>
        </div>
        <div class="dashboard-content">
            <ul class="nav nav-pills" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pinjam-tab" data-toggle="tab" href="#pinjam" role="tab"
                        aria-controls="pinjam" aria-selected="true">Dipinjam</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="kembali-tab" data-toggle="tab" href="#kembali" role="tab"
                        aria-controls="kembali" aria-selected="false">Selesai</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="pinjam" role="tabpanel" aria-labelledby="pinjam-tab">
                    <div class="row mt-3">
                        <div class="col-12 mt-2">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Buku</th>
                                            <th scope="col">Judul & author</th>
                                            <th scope="col">Peminjam</th>
                                            <th scope="col">Tanggal Peminjaman</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaction_data as $transaction)
                                        <tr>
                                            <td>
                                                <img src="{{ Storage::url($transaction->book->galleries->first()->foto) }}"
                                                    alt="" width="70px" height="100px" style="object-fit: contain;" />
                                            </td>
                                            <td class="align-middle">
                                                <div class="product-subtitle">{{ $transaction->book->judul }}</div>
                                                <div class="product-title">by {{
                                                    $transaction->book->penulis->nama_penulis
                                                    }}</div>
                                            </td>
                                            <td class="align-middle">{{ $transaction->transaction->user->nama }}</td>
                                            <td class="align-middle">{{
                                                Carbon\Carbon::parse($transaction->transaction->tanggal_pinjam)->format('d
                                                F Y') }}</td>
                                            <td class="align-middle">{{ $transaction->transaction->status }}</td>
                                            <td class="align-middle">
                                                <a href="{{ route('dashboard-peminjaman-detail', $transaction->id) }}">
                                                    <img src="/images/dashboard-arrow-right.svg" alt="" />
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="kembali" role="tabpanel" aria-labelledby="kembali-tab">
                    <div class="row mt-3">
                        <div class="col-12 mt-2">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Buku</th>
                                            <th scope="col">Judul & author</th>
                                            <th scope="col">Peminjam</th>
                                            <th scope="col">Tanggal Pengembalian</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($selesai as $transaction)
                                        <tr>
                                            <td>
                                                <img src="{{ Storage::url($transaction->book->galleries->first()->foto) }}"
                                                    alt="" width="70px" height="100px" style="object-fit: contain;" />
                                            </td>
                                            <td class="align-middle">
                                                <div class="product-subtitle">{{ $transaction->book->judul }}</div>
                                                <div class="product-title">by {{
                                                    $transaction->book->penulis->nama_penulis
                                                    }}</div>
                                            </td>
                                            <td class="align-middle">{{ $transaction->transaction->user->nama }}</td>
                                            <td class="align-middle">
                                                {{Carbon\Carbon::parse($transaction->transaction->tanggal_kembali)->format('d
                                                F Y') }}
                                            </td>
                                            <td class="align-middle">{{ $transaction->transaction->status }}</td>
                                            <td class="align-middle">
                                                <a href="{{ route('dashboard-peminjaman-detail', $transaction->id) }}">
                                                    <img src="/images/dashboard-arrow-right.svg" alt="" />
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection