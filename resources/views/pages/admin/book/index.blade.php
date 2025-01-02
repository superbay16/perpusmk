@extends('layouts.admin')

@section('title')
Admin List Book
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Admin Book</h2>
            <p class="dashboard-subtitle">
                List of Book
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('book.create') }}" class="btn btn-primary mb-3">+ Tambah Book</a>
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>ISBN</th>
                                            <th>Judul</th>
                                            <th>Penulis</th>
                                            <th>Penerbit</th>
                                            <th>Kategori</th>
                                            <th>Tahun Terbit</th>
                                            <th>Buku</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
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
<script>
    // AJAX DataTable
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'isbn', name: 'isbn' },
                { data: 'judul', name: 'judul' },
                { data: 'penulis.nama_penulis', name: 'penulis.nama_penulis' },
                { data: 'penerbit.nama_penerbit', name: 'penerbit.nama_penerbit' },
                { data: 'category.nama', name: 'category.nama' },
                { data: 'tahun_terbit', name: 'tahun_terbit' },
                { data: 'pdf', name: 'pdf' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
            ]
        });
</script>
@endpush