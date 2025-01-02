@extends('layouts.dashboard')


@section('title')
Perpustakaan Dashboard Buku Detail Page
@endsection


@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Shirup Marzan</h2>
            <p class="dashboard-subtitle">
                Product Details
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
                                                name="storeName" value="best life" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="penulis">Penulis</label>
                                            <select name="penulis" id="penulis" class="form-control">
                                                <option value="Prof. Haaland" disabled>Pilih penulis</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="isbn">ISBN</label>
                                            <input type="text" class="form-control" id="isbn" aria-describedby="isbn"
                                                name="isbn" value="819284723" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="penerbit">Penerbit</label>
                                            <select name="penerbit" id="penerbit" class="form-control">
                                                <option value="gramedia" disabled>Pilih penerbit</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tahun">Tahun terbit</label>
                                            <input type="number" class="form-control" min="1900" max="2099" step="1"
                                                value="2023" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kategori">kategori</label>
                                            <select name="kategori" id="kategori" class="form-control">
                                                <option value="sains" disabled>Pilih kategori</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tahun">Halaman</label>
                                            <input type="number" class="form-control" step="1" value="321" />
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
                                            <label for="newPdfFile">Upload New PDF</label>
                                            <input type="file" class="form-control pt-1" id="newPdfFile"
                                                name="newPdfFile" accept=".pdf" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-success btn-block px-5">
                                            Update Product
                                        </button>
                                    </div>
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
                                <div class="col-md-4">
                                    <div class="gallery-container">
                                        <img src="/images/product/product_3.jpg" alt="" class="w-100" />
                                        <a class="delete-gallery" href="#">
                                            <img src="/images/icon-delete.svg" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="gallery-container">
                                        <img src="/images/product/product_2.jpg" alt="" class="w-100" />
                                        <a class="delete-gallery" href="#">
                                            <img src="/images/icon-delete.svg" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="gallery-container">
                                        <img src="/images/product/product_1.jpg" alt="" class="w-100" />
                                        <a class="delete-gallery" href="#">
                                            <img src="/images/icon-delete.svg" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col mt-3">
                                    <input type="file" id="file" style="display: none;" multiple />
                                    <button class="btn btn-secondary btn-block" onclick="thisFileUpload();">
                                        Add Photo
                                    </button>
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
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
</script>
<script>
    function thisFileUpload() {
        document.getElementById("file").click();
      }
</script>
@endpush