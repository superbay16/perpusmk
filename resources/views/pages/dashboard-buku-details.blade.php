@extends('layouts.dashboard')


@section('title')
Perpustakaan Dashboard buku detail Page
@endsection


@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">ISBN ({{ $book->isbn }})</h2>
            <p class="dashboard-subtitle">
                Detail Buku
            </p>
        </div>
        <div class="dashboard-content" id="transactionDetails">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <img src="{{ Storage::url($book->galleries->first()->foto) ?? '' }}" alt=""
                                        class="w-100 h-100" style="object-fit: contain; width: 100%; height: 100%;" />
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Judul Buku</div>
                                            <div class="product-subtitle">{{ $book->judul }}</div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Author</div>
                                            <div class="product-subtitle">
                                                {{ $book->penulis->nama_penulis }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Penerbit</div>
                                            <div class="product-subtitle">
                                                {{ $book->penerbit->nama_penerbit }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">kategori</div>
                                            <div class="product-subtitle">
                                                {{ $book->category->nama }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">
                                                Bahasa
                                            </div>
                                            <div class="product-subtitle">
                                                {{ $book->bahasa }}
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Tahun terbit</div>
                                            <div class="product-subtitle">{{ $book->tahun_terbit }}</div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Halaman</div>
                                            <div class="product-subtitle">
                                                {{ $book->halaman }} halaman
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mt-4">
                                    <h5>
                                        Deskripsi
                                    </h5>
                                    {!! $book->deskripsi!!}
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

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script>
    var transactionDetails = new Vue({
            el: "#transactionDetails",
            data: {
                status: "Diproses",
                kode: "BDO12308012132",
            },
        });
</script>
@endpush