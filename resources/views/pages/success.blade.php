@extends('layouts.success')

@section('title')
perpustakaan success page
@endsection

@section('content')
<div class="page-content page-success">
    <div class="section-success" data-aos="zoom-in">
        <div class="container">
            <div class="row align-items-center row-login justify-content-center">
                <div class="col-lg-6 text-center">
                    <img src="/images/success.png" alt="" class="mb-4" />
                    <h2>
                        Peminjaman berhasil!
                    </h2>
                    <p>
                        Silahkan cek dashboard kamu, <br />
                        untuk informasi lebih lanjut!
                    </p>
                    <div>
                        <a class="btn btn-primary w-50 mt-4" href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                        <a class="btn btn-signup w-50 mt-2" href="{{ route('home') }}">
                            Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection