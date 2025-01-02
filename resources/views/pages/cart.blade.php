@extends('layouts.app')

@section('title')
perpustakaan success page
@endsection

@section('content')
<div class="page-content page-cart">
    <section class="perpus-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="perpus-cart">
        <div class="container">
            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-12 table-responsive">
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <!-- Tampilkan pesan berhasil -->
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    @if(isset($carts) && count($carts) > 0)
                    <table class="table table-borderless table-cart" aria-describedby="Cart">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">book &amp; author</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                            <tr>
                                <td style="width: 25%;">
                                    @if($cart->book->galleries)
                                    <img src="{{ Storage::url($cart->book->galleries->first()->foto) }}" alt=""
                                        class="cart-image" />
                                    @endif
                                </td>
                                <td style="width: 35%;">
                                    <div class="product-title">{{ $cart->book->judul }}</div>
                                    <div class="product-subtitle">by {{ $cart->book->penulis->nama_penulis }}</div>
                                </td>
                                <td style="width: 35%;">
                                    <div class="product-title">{{ $cart->book->category->nama }}</div>
                                </td>
                                <td style="width: 20%;">
                                    <form action="{{ route('cart-delete', $cart->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-remove-cart" type="submit">
                                            Remove
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="150">
                <div class="col-12">
                    <hr />
                </div>
                <div class="col-12">
                    <h2 class="mb-4">Peminjam Details</h2>
                </div>
            </div>
            <form action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            @if(isset($cart) && $cart->user && $cart->user->nama)
                            <input type="text" class="form-control border border-success" id="nama"
                                aria-describedby="emailHelp" name="nama" value="{{ $cart->user->nama }}" readonly />
                            @else
                            <input type="text" class="form-control border border-danger" id="nama"
                                aria-describedby="emailHelp" name="nama" placeholder="masukkan nama kamu" />
                            @endif
                        </div>
                    </div>
                    <div class=" col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            @if(isset($cart) && $cart->user && $cart->user->email)
                            <input type="text" class="form-control border border-success" id="email"
                                aria-describedby="emailHelp" name="email" value="{{ $cart->user->email }}" readonly />
                            @else
                            <input type="text" class="form-control border border-danger" id="email"
                                aria-describedby="emailHelp" name="email" placeholder="masukkan email kamu" />
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="alamat">alamat</label>
                            @if(isset($cart) && $cart->user && $cart->user->alamat)
                            <input type="text" class="form-control" id="alamat" aria-describedby="alamatHelp"
                                name="alamat" value="{{ $cart->user->alamat }}" />
                            @else
                            <input type="text" class="form-control border border-danger" id="alamat"
                                aria-describedby="alamatHelp" name="alamat" placeholder="masukkan alamat kamu" />
                            @endif
                        </div>
                    </div>
                    <div class=" col-md-6">
                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>
                            @if(isset($cart) && $cart->user && $cart->user->jenis_kelamin)
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="pria" {{ $cart->user->jenis_kelamin == 'pria' ? 'selected' : ''
                                    }}>Pria</option>
                                <option value="wanita" {{ $cart->user->jenis_kelamin == 'wanita' ? 'selected'
                                    : '' }}>Wanita</option>
                            </select>
                            @else
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control border border-danger">
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                            </select>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">No hp</label>
                            @if(isset($cart) && $cart->user && $cart->user->nama)
                            <input type="text" class="form-control" id="nomor_telp" name="nomor_telp"
                                value="{{ $cart->user->nomor_telp }}" />
                            @else
                            <input type="text" class="form-control border border-danger" id="nomor_telp"
                                name="nomor_telp" placeholder="Masukkan nomor telpon" />
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="col-12">
                        <h2>peminjaman Informations</h2>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
                            <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                            <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian"
                                class="form-control" readonly>
                        </div>
                    </div>

                    <div class="col-8 col-md-3">
                        <button class="btn btn-primary mt-4 px-4 btn-block">
                            Pinjam Sekarang
                        </button>
                    </div>
                </div>
            </form>
            @else
            <div class="alert alert-info">
                Kamu belum melakukan peminjaman, silahkan pinjam buku terlebih dahulu.
                <a href="{{ route('category') }}">Cari buku <i class="fas fa-arrow-right"></i></a>
            </div>
            @endif
        </div>
    </section>
</div>
@endsection

@push('addon-script')
<script>
    // Ambil elemen input tanggal peminjaman
    const tanggalPeminjamanInput = document.getElementById('tanggal_peminjaman');
    const tanggalPengembalianInput = document.getElementById('tanggal_pengembalian');

    // Dapatkan tanggal hari ini
    const today = new Date();

    // Tambahkan event listener untuk input tanggal peminjaman
    tanggalPeminjamanInput.addEventListener('change', function () {
        // Ambil tanggal peminjaman
        const tanggalPeminjaman = new Date(tanggalPeminjamanInput.value);

        // Cek apakah tanggal peminjaman sama dengan hari ini
        if (
            tanggalPeminjaman.getDate() !== today.getDate() ||
            tanggalPeminjaman.getMonth() !== today.getMonth() ||
            tanggalPeminjaman.getFullYear() !== today.getFullYear()
        ) {
            // Tampilkan pesan error
            alert('Peminjaman hanya bisa dilakukan pada hari ini.');
            // Reset input tanggal peminjaman
            tanggalPeminjamanInput.value = '';
            // Hentikan eksekusi lebih lanjut
            return;
        }

        // Tambahkan 3 hari ke tanggal peminjaman
        tanggalPeminjaman.setDate(tanggalPeminjaman.getDate() + 3);

        // Format tanggal pengembalian menjadi YY1YY-MM-DD
        const tahun = tanggalPeminjaman.getFullYear();
        const bulan = String(tanggalPeminjaman.getMonth() + 1).padStart(2, '0');
        const tanggal = String(tanggalPeminjaman.getDate()).padStart(2, '0');
        const tanggalPengembalian = `${tahun}-${bulan}-${tanggal}`;

        // Isi input tanggal pengembalian
        tanggalPengembalianInput.value = tanggalPengembalian;
    });
</script>
@endpush