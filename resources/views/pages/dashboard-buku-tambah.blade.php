@extends('layouts.dashboard')


@section('title')
Perpustakaan Dashboard Tambah Buku Page
@endsection


@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Tambah buku</h2>
            <p class="dashboard-subtitle">
                Reading, Learning, Growing.
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    <form action="">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="judul">Judul Buku</label>
                                            <input type="text" class="form-control" id="judul" aria-describedby="judul"
                                                name="storeName" value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="penulis">Penulis</label>
                                            <select name="penulis" id="penulis" class="form-control">
                                                <option value="" disabled>Pilih penulis</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="isbn">ISBN</label>
                                            <input type="text" class="form-control" id="isbn" aria-describedby="isbn"
                                                name="isbn" value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="penerbit">Penerbit</label>
                                            <select name="penerbit" id="penerbit" class="form-control">
                                                <option value="" disabled>Pilih penerbit</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tahun">Tahun terbit</label>
                                            <input type="number" class="form-control" min="1900" max="2099" step="1"
                                                value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kategori">kategori</label>
                                            <select name="kategori" id="kategori" class="form-control">
                                                <option value="" disabled>Pilih kategori</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tahun">Halaman</label>
                                            <input type="number" class="form-control" step="1" value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bahasa">Bahasa</label>
                                            <select name="bahasa" id="bahasa" class="form-control">
                                                <option value="" disabled>Pilih bahasa</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <div id="editor">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="pdfFile">Upload PDF</label>
                                            <input type="file" class="form-control pt-1" id="pdfFile" name="pdfFile"
                                                accept=".pdf" />
                                            <small class="text-muted">
                                                Pilih file PDF yang ingin diunggah
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="thumbnails">Thumbnails</label>
                                            <input type="file" multiple class="form-control pt-1" id="thumbnails"
                                                aria-describedby="thumbnails" name="thumbnails" />
                                            <small class="text-muted">
                                                Kamu dapat memilih lebih dari satu file
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6 mx-auto">
                                <button type="submit" class="btn btn-primary btn-block px-5 mb-5">
                                    Save Now
                                </button>
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
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
</script>
@endpush