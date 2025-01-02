<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>

    <!-- Styles -->
    @stack('prepend-style')
    @include('includes.style')
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
    @stack('addon-style')

    <!-- Custom CSS -->
    <style>
        /* General Reset */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        /* Sidebar Styling */
        #sidebar-wrapper {
            background-color: teal !important;
            color: white !important;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        #sidebar-wrapper .sidebar-heading {
            font-size: 1.5rem;
            color: white !important;
            padding: 1.5rem 0;
        }

        #sidebar-wrapper .list-group-item {
            background-color: transparent !important;
            color: white !important;
            border: none !important;
            transition: all 0.2s ease-in-out !important;
        }

        #sidebar-wrapper .list-group-item:hover,
        #sidebar-wrapper .list-group-item.active {
            background-color: rgba(255, 255, 255, 0.2) !important;
            color: white !important;
        }

        /* Page Content Wrapper */
        #page-content-wrapper {
            width: 100%;
            padding: 2rem;
        }

        /* Navbar Styling */
        .navbar-perpus {
            #;
        }

        .navbar-perpus .navbar-toggler {
            border: none;
        }

        .navbar-perpus .navbar-toggler-icon {
            background-color: white;
        }

        .navbar-perpus .nav-link {
            color: solid black !important;
            transition: all 0.2s ease-in-out;
        }

        .navbar-perpus .nav-link:hover {
            color: rgba(255, 255, 255, 0.8) !important;
        }

        /* Responsive Sidebar */
        @media (max-width: 768px) {
            #wrapper.toggled #sidebar-wrapper {
                margin-left: -250px;
            }

            #sidebar-wrapper {
                margin-left: 0;
            }

            #page-content-wrapper {
                padding: 1rem;
            }
        }

        @media (min-width: 769px) {
            #wrapper.toggled #sidebar-wrapper {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <div class="page-dashboard">
        <div class="d-flex" id="wrapper" data-aos="fade-right">
            <!-- Sidebar -->
            <div class="border-right" id="sidebar-wrapper">
                <div class="sidebar-heading text-center">
                    <img src="/images/admin.svg" alt="Admin Logo" class="my-4" />
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('admin-dashboard') }}"
                        class="list-group-item list-group-item-action {{ request()->is('admin') ? 'active' : '' }}">Dashboard</a>
                    <a href="{{ route('book.index') }}"
                        class="list-group-item list-group-item-action {{ request()->is('admin/book') ? 'active' : '' }}">Buku</a>
                    <a href="{{ route('book-gallery.index') }}"
                        class="list-group-item list-group-item-action {{ request()->is('admin/book-gallery*') ? 'active' : '' }}">Gallery</a>
                    <a href="{{ route('user.index') }}"
                        class="list-group-item list-group-item-action {{ request()->is('admin/user*') ? 'active' : '' }}">User</a>
                    <a href="{{ route('penulis.index') }}"
                        class="list-group-item list-group-item-action {{ request()->is('admin/penulis*') ? 'active' : '' }}">Penulis</a>
                    <a href="{{ route('penerbit.index') }}"
                        class="list-group-item list-group-item-action {{ request()->is('admin/penerbit*') ? 'active' : '' }}">Penerbit</a>
                    <a href="{{ route('category.index') }}"
                        class="list-group-item list-group-item-action {{ request()->is('admin/category*') ? 'active' : '' }}">Kategori</a>
                    <a href="{{ route('peminjaman.index') }}"
                        class="list-group-item list-group-item-action {{ request()->is('admin/peminjaman*') ? 'active' : '' }}">Peminjaman</a>
                    <a href="{{ route('account.index') }}"
                        class="list-group-item list-group-item-action {{ request()->is('admin/account*') ? 'active' : '' }}">My
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
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Hi, {{ Auth::user()->nama }}
                                    <img src="/images/user_pc.png" alt="Profile Picture"
                                        class="rounded-circle mr-2 profile-picture" />
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/') }}">Kembali ke beranda</a>
                                    <a class="dropdown-item" href="{{ route('dashboard-account') }}">Settings</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('logout') }}"
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
                        </ul>
                    </div>
                </nav>

                @yield('content')
            </div>
            <!-- /#page-content-wrapper -->
        </div>
    </div>

    <!-- JavaScript -->
    @stack('prepend-script')
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
    <script>
        $("#datatable").DataTable();
    </script>
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
