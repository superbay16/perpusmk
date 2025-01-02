@extends('layouts.admin')


@section('title')
Admin Edit Peminjaman
@endsection


@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Peminjaman</h2>
            <p class="dashboard-subtitle">
                Edit "{{ $item->code }}" | {{ $item->user->nama }}
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
                    <form action="{{ route('peminjaman.update', $item->id) }}" method="post"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Peminjaman Status</label>
                                            <select name="status" class="form-control">
                                                <option value="{{ $item->status }}">{{
                                                    $item->status }}</option>
                                                <option value="" disabled>----------------</option>
                                                <option value="dipinjam">dipinjam</option>
                                                <option value="selesai">selesai</option>
                                            </select>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection