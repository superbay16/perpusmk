@extends('layouts.app')

@section('title')
Tentang Kami
@endsection

@section('content')
<div class="page-content page-about">
    <section class="perpus-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Tentang Kami</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="perpus-about mt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                    <h1 class="about-title mb-4">Tentang Kami</h1>
                    <p>Selamat datang di situs perpustakaan kami! Kami berkomitmen untuk memberikan pengalaman membaca yang menyenangkan dan akses mudah ke berbagai koleksi buku.</p>

                    <h2 class="about-subtitle mt-4">Visi</h2>
                    <p>Menciptakan komunitas pembaca yang aktif dan terus berkembang dengan menyediakan buku-buku terbaik.</p>

                    <h2 class="about-subtitle mt-4">Misi</h2>
                    <ul class="about-list">
                        <li>Menyediakan koleksi buku yang beragam untuk semua kalangan.</li>
                        <li>Memberikan pelayanan terbaik kepada pengguna.</li>
                        <li>Mendukung kegiatan literasi di masyarakat.</li>
                    </ul>

                    <h2 class="about-subtitle mt-4">Hubungi Kami</h2>
                    <p>Jika Anda memiliki pertanyaan atau membutuhkan bantuan, jangan ragu untuk menghubungi kami melalui:</p>
                    <ul class="about-contact">
                        <li>Email: smkmuhammadiyahloajanan@gmail.com</li>
                        <li>Telepon: (0541) 266058</li>
                    </ul>

                    <p class="mt-4">Terima kasih</p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

<style>
    .page-about .about-title {
    font-size: 2.5rem;
    font-weight: bold;
    color: #333;
}

.page-about .about-subtitle {
    font-size: 1.5rem;
    font-weight: bold;
    margin-top: 20px;
}

.page-about .about-list {
    list-style: disc;
    padding-left: 20px;
}

.page-about .about-contact {
    list-style: none;
    padding: 0;
}

.page-about .about-contact li {
    margin-bottom: 10px;
    font-weight: bold;
    color: #555;
}
</style>