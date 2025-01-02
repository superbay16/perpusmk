@extends('layouts.admin')


@section('title')
Admin Edit Book
@endsection


@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Book</h2>
            <p class="dashboard-subtitle">
                Edit "{{ $item->judul }}" Book
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('book.update', $item->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ISBN</label>
                                            <input type="number" class="form-control" name="isbn"
                                                value="{{ $item->isbn }}" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input type="text" class="form-control" name="judul"
                                                value="{{ $item->judul }}" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Penulis</label>
                                            <select name="penulis_id" required class="form-control select2">
                                                <option value="{{ $item->penulis_id }}">{{ $item->penulis->nama_penulis
                                                    }}</option>
                                                <option value="" disabled>-- Pilih Penulis --</option>
                                                @foreach ($penulis as $penulis)
                                                <option value="{{ $penulis->id }}">{{ $penulis->nama_penulis }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Penerbit</label>
                                            <select name="penerbits_id" required class="form-control select2">
                                                <option value="{{ $item->penerbits_id }}">{{
                                                    $item->penerbit->nama_penerbit
                                                    }}</option>
                                                <option value="" disabled>-- Pilih Penerbit --</option>
                                                @foreach ($penerbits as $penerbits)
                                                <option value="{{ $penerbits->id }}">{{ $penerbits->nama_penerbit }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Kategori </label>
                                            <select name="categories_id" class="form-control">
                                                <option value="{{ $item->categories_id }}">{{ $item->category->nama }}
                                                </option>
                                                <option value="" disabled>-- Pilih Kategori --</option>
                                                @foreach ($categories as $categories)
                                                <option value="{{ $categories->id }}">{{ $categories->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tahun terbit</label>
                                            <input type="number" class="form-control" name="tahun_terbit"
                                                value="{{ $item->tahun_terbit }}" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Bahasa</label>
                                            <input type="text" class="form-control" name="bahasa"
                                                value="{{ $item->bahasa }}" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Total halaman</label>
                                            <input type="number" class="form-control" name="halaman"
                                                value="{{ $item->halaman }}" required />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea name="deskripsi" id="editor">{!! $item->deskripsi !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>PDF File</label>
                                            <input type="file" class="form-control" name="pdf" {{ $item->pdf }}
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-success px-5">
                                            Save Now
                                        </button>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($item->galleries as $gallery)
                                <div class="col-md-4">
                                    <div class="gallery-container">
                                        <img src="{{ Storage::url($gallery->foto ?? '') }}" alt="" class="w-100" />
                                        <a class="delete-gallery"
                                            href="{{ route('book.deleteGallery', $gallery->id) }}">
                                            <img src="/images/icon-delete.svg" alt="" />
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                                <div class="col-12">
                                    <form action="{{ route('book.uploadGallery') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="books_id">
                                        <input type="file" name="foto" id="file" style="display: none;" multiple
                                            onchange="form.submit()" />
                                        <button type="button" class="btn btn-secondary btn-block mt-3"
                                            onclick="thisFileUpload()">
                                            Add Photo
                                        </button>
                                    </form>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
<script>
    function thisFileUpload() {
      document.getElementById("file").click();
    }
</script>
<script>
    ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
</script>
<script>
    $('.select2').select2();
</script>
@endpush