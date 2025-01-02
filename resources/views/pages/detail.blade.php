@extends('layouts.app')

@section('title')
perpustakaan detail page
@endsection

@section('content')
<div class="page-content page-details">
    <section class="perpus-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/index.html">Home</a></li>
                            <li class="breadcrumb-item active">Detail Buku</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="perpus-gallery" id="gallery">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" data-aos="zoom-in">
                    <transition name="slide-fade" mode="out-in">
                        <img :src="photos[activePhoto].url" :key="photos[activePhoto].id"
                            class="w-100 main-page mx-auto" alt="">
                    </transition>
                </div>
                <div class="col-lg-2">
                    <div class="row">
                        <div class="col-3 col-lg-12 mt-2 mt-lg-0" v-for="(photo, index) in photos" :key="photo.id"
                            data-aos="zoom-in" data-aos-delay="100">
                            <a href="#" @click="changeActive(index)">
                                <img :src="photo.url" class="w-100 thumbnail-image"
                                    :class="{active: index == activePhoto}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="perpus-details-container" data-aos="fade-up">
        <section class="perpus-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h1>{{ $book->judul }}</h1>
                        <div class="author"><a href="{{ route('penulis') }}">{{ $book->penulis->nama_penulis }}</a>
                        </div>

                    </div>
                    <div class="col-lg-2" data-aos="zoom-in">
                        @auth
                        <form action="{{ route('detail-add', $book->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <button type="submit" class="btn btn-primary px-4 text-white btn-block mb-3">Pinjam</button>
                        </form>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-primary px-4 text-white btn-block mb-3">Sign in to
                            pinjam
                        </a>
                        @endauth

                    </div>
                </div>
            </div>
        </section>

        <section class="perpus-table">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8">

                        <table class="table table-hover">

                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>ISBN</td>
                                    <td>{{ $book->isbn }}</td>

                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>PENERBIT</td>
                                    <td><a href="{{ route('penerbit') }}">{{ $book->penerbit->nama_penerbit }}</a></td>

                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>KATEGORI</td>
                                    <td>{{ $book->category->nama }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>BAHASA</td>
                                    <td>{{ $book->bahasa }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>HALAMAN</td>
                                    <td>{{ $book->halaman }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>TAHUN TERBIT</td>
                                    <td>{{ $book->tahun_terbit }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <section class="perpus-description">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <h3>deskripsi</h3>
                        {!! $book->deskripsi!!}
                    </div>
                </div>
            </div>
        </section>
        {{-- <section class="perpus-review">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8 mt-3 mb-3">
                        <h5>Review (5)</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <ul class="list-unstyled">
                            <li class="media">
                                <img src="{{ url('images/pic.png') }}" alt="" class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <h5 class="mt-2 mb-1">Budi</h5>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus, earum.
                                </div>
                            </li>
                            <li class="media">
                                <img src="{{ url('images/pic.png') }}" alt="" class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <h5 class="mt-2 mb-1">Budi</h5>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus, earum.
                                </div>
                            </li>
                            <li class="media">
                                <img src="{{ url('images/pic.png') }}" alt="" class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <h5 class="mt-2 mb-1">Budi</h5>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus, earum.
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section> --}}
    </div>
</div>
@endsection

@push('addon-script')
<script src="{{ url('vendor/vue/vue.js') }}"></script>
<script>
    var gallery = new Vue({
            el: "#gallery",
            mounted() {
                AOS.init();
            },
            data: {
                activePhoto: 0,
                photos: [
                  @foreach ($book->galleries as $gallery)
                {
                id: {{ $gallery->id }},
                url: "{{ Storage::url($gallery->foto) }}",
                },
                @endforeach
                ],
            },
            methods: {
                changeActive(id) {
                    this.activePhoto = id;
                }
            }

        });
</script>
@endpush