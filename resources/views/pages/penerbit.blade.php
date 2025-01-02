@extends('layouts.app')

@section('title')
perpustakaan penulis page
@endsection

@section('content')
<div class="page-content page-home">


    <!-- start list product -->
    <section class="perpus-new-product">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>Semua penerbit</h5>
                </div>
            </div>
            <div class="row mt-3">
                @foreach ($penerbit as $penerbit)
                <div class="col-md-2">
                    <div class="card text-center">
                        <a href="#">
                            <img src="{{ Storage::url($penerbit->foto) }}" class="card-img-top
                        rounded-circle" alt="User Image" style="max-width: 100%;"></a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $penerbit->nama_penerbit }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end list product -->
</div>
@endsection