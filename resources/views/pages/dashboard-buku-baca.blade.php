@extends('layouts.dashboard')


@section('title')
Perpustakaan Dashboard Buku Page
@endsection


@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Buku {{ $book->judul }}</h2>
            <p class="dashboard-subtitle">
                Reading, Learning, Growing.
            </p>
        </div>
        <div class="dashboard-content">
            <iframe src="{{ Storage::url($book->pdf) }}" width="100%" height="600"></iframe>
        </div>
    </div>
    @endsection