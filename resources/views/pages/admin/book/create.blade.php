@extends('layouts.admin')

@section('title')
Admin Add Book
@endsection
@push('addon-style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endpush

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Book</h2>
            <p class="dashboard-subtitle">
                Create a new book
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
                    <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ISBN</label>
                                            <input type="number" class="form-control" name="isbn" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input type="text" class="form-control" name="judul" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Penulis</label>
                                            <select name="penulis_id" required class="form-control select2">
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
                                            <label>Kategori book</label>
                                            <select name="categories_id" required class="form-control select2">
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
                                            <input type="number" class="form-control" name="tahun_terbit" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Bahasa</label>
                                            <input type="text" class="form-control" name="bahasa" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Total halaman</label>
                                            <input type="number" class="form-control" name="halaman" required />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea name="deskripsi" id="editor"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>PDF File</label>
                                            <input type="file" class="form-control" name="pdf" required />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="foto">thumbnails</label>
                                            <input type="file" multiple class="form-control pt-1" id="foto"
                                                aria-describedby="foto" name="foto" />
                                            <small class="text-muted">
                                                Kamu dapat memilih lebih dari satu file
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5">
                                            Save Now
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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