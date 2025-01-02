@extends('layouts.dashboard')


@section('title')
Perpustakaan Dashboard Buku Page
@endsection


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
                    <a href="/dashboard-tambah-buku.html" class="btn btn-primary">tambah buku baru</a>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a class="card card-dashboard-product d-block" href="#">
                        <div class="card-body">
                            <img src="/images/product/product_1.jpg" alt="" class="w-100 mb-2" />
                            <div class="product-title">Shirup Marzzan</div>
                            <div class="product-category">Foods</div>
                        </div>
                    </a>
                    <a href="/dashboard-buku-detail.html" class="btn btn-primary"
                        style="width: 100%; margin-top: 10px; display: block;">Detail</a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a class="card card-dashboard-product d-block" href="#">
                        <div class="card-body">
                            <img src="/images/product/product_2.jpg" alt="" class="w-100 mb-2" />
                            <div class="product-title">Shirup Marzzan</div>
                            <div class="product-category">Foods</div>
                        </div>
                    </a>
                    <a href="/dashboard-buku-detail.html" class="btn btn-primary"
                        style="width: 100%; margin-top: 10px; display: block;">Detail</a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a class="card card-dashboard-product d-block" href="#">
                        <div class="card-body">
                            <img src="/images/product/product_2.jpg" alt="" class="w-100 mb-2" />
                            <div class="product-title">Shirup Marzzan</div>
                            <div class="product-category">Foods</div>
                        </div>
                    </a>
                    <a href="/dashboard-buku-detail.html" class="btn btn-primary"
                        style="width: 100%; margin-top: 10px; display: block;">Detail</a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a class="card card-dashboard-product d-block" href="#">
                        <div class="card-body">
                            <img src="/images/product/product_2.jpg" alt="" class="w-100 mb-2" />
                            <div class="product-title">Shirup Marzzan</div>
                            <div class="product-category">Foods</div>
                        </div>
                    </a>
                    <a href="/dashboard-buku-detail.html" class="btn btn-primary"
                        style="width: 100%; margin-top: 10px; display: block;">Detail</a>
                </div>

            </div>
        </div>
    </div>
    @endsection