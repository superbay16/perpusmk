<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>


    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
</head>
</head>

<body>
    <div class="page-dashboard">
        <div class="d-flex" id="wrapper" data-aos="fade-right">
            <!-- Sidebar -->
            <div class="border-right" id="sidebar-wrapper">
                <div class="sidebar-heading text-center">
                <img src="/images/logo.png" alt="" class="my-4" width="76px" height="76px">
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('dashboard') }}"
                        class="list-group-item list-group-item-action {{ (request()->is('dashboard')) ? 'active' : '' }}">Dashboard</a>
                    <a href="{{ route('dashboard-buku') }}"
                        class="list-group-item list-group-item-action {{ (request()->is('dashboard/buku*')) ? 'active' : '' }}">Buku
                        saya</a>
                    <a href="{{ route('dashboard-peminjaman') }}"
                        class="list-group-item list-group-item-action {{ (request()->is('dashboard/peminjaman*')) ? 'active' : '' }}">Peminjaman</a>
                    <a href="{{ route('dashboard-account') }}"
                        class="list-group-item list-group-item-action {{ (request()->is('dashboard/account*')) ? 'active' : '' }}">My
                        Account</a>
                </div>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <nav class="navbar navbar-perpus navbar-expand-lg navbar-light fixed-top" data-aos="fade-down">
                    <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
                        &laquo; Menu
                    </button>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto d-none d-lg-flex">
                            <li class="nav-item">
                                <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
                                    @php
                                    $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
                                    @endphp
                                    @if($carts > 0)
                                    <img src="/images/cart-fill.svg" alt="" />
                                    <div class="card-badge">{{ $carts }}</div>
                                    @else
                                    <img src="/images/shopping.svg" alt="" />
                                    @endif
                                </a>

                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Hi, {{ Auth::user()->nama }}
                                    <img src="/images/user_pc.png" alt="" class="rounded-circle mr-2 profile-picture" />
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/') }}">Kembali ke beranda</a>
                                    <a class="dropdown-item" href="{{ route('dashboard-account') }}l">Settings</a>
                                    <div class="dropdown-divider"></div>
                                    <<a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="dropdown-item">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                </div>
                            </li>

                        </ul>
                        <!-- Mobile Menu -->
                        <ul class="navbar-nav d-block d-lg-none mt-3">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Hi, {{ Auth::user()->nama }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-inline-block" href="{{ route('cart') }}">
                                    Cart
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                @yield('content')
            </div>
            <!-- /#page-content-wrapper -->
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    @stack('prepend-script')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    @stack('addon-script')
</body>

</html>
<style>
#sidebar-wrapper {
    background-color: teal !important;
    color: white !important;
    min-height: 100vh;
    transition: all 0.3s ease;
}

/* Ensure all list items inherit the teal background and white text */
#sidebar-wrapper .list-group-item {
    background-color: teal !important;
    color: white !important;
    border: none !important; /* Remove any borders */
}

/* Change the hover effect to make it consistent */
#sidebar-wrapper .list-group-item:hover {
    background-color: #006d6d !important; /* Darker teal for hover effect */
    color: white !important;
}

/* Active state for the menu */
#sidebar-wrapper .list-group-item.active {
    background-color: #005757 !important; /* Darkest teal for active state */
    color: white !important;
    font-weight: bold;
}
</style>
