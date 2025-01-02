@extends('layouts.app')

@section('title')
perpustakaan buku page
@endsection

@section('content')
<div class="page-content page-home">

    <!-- start list categories -->
    <section class="perpus-list-categories">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>Semua Kategori</h5>
                </div>
            </div>
            <div class="row">
                @php $incrementCategory = 0 @endphp
                @forelse ($categories as $category)
                <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $incrementCategory+= 100 }}">
                    <a href="{{ route('category-detail', $category->slug) }}" class="component-categories d-block">
                        <div class="categories-image"><img src="{{  Storage::url($category->foto) }}" alt=""
                                class="w-100">
                        </div>
                        <p class="categories-text">{{ $category->nama }}</p>
                    </a>
                </div>
                @empty
                <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                    No Categories Found
                </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- end list categories -->

    <!-- start list product -->
    <section class="perpus-new-product">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>Semua Buku</h5>
                </div>
            </div>
            <div class="row">
                @php $incrementBook = 0 @endphp
                @forelse ($books as $book)
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{  $incrementBook += 100 }}">
                    <a href="{{ route('detail', $book->slug) }}" class="component-product d-block">
                        <div class="product-thumbnail">
                            <div class="product-image" style="@if($book->galleries)
                                background-image: url('{{ Storage::url($book->galleries->first()->foto) }}');
                                @else
                                background-color: #eee;
                                @endif">
                            </div>
                        </div>
                        <div class="product-author">{{ $book->penulis->nama_penulis }}</div>
                        <div class="product-text">{{ $book->judul }}</div>

                    </a>
                </div>
                @empty
                <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                    No Buku Found
                </div>
                @endforelse
            </div>
            <div class="row">
                <div class="col-12 mt-4">
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </section>
    <!-- end list product -->
</div>
@endsection