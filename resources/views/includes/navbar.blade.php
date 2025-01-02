<nav class="navbar navbar-expand-lg navbar-light navbar-teal navbar-perpus fixed-top navbar-fixed-top" data-aos="fade-down">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="http://perpus.test/images/logo.png" alt="logo" width="76" height="76">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="nav-link">Beranda</a>
                </li>
                <li class="nav-item {{ (request()->is('category*')) ? 'active' : '' }}">
                    <a href="{{ route('category') }}" class="nav-link">Buku</a>
                </li>
                <li class="nav-item">
                    <a href="/tentang" class="nav-link">Tentang</a>
                </li>
                @guest
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-primary nav-link px-4 text-white">Sign In</a>
                </li>
                @endguest
            </ul>

            @auth
            <ul class="navbar-nav d-none d-lg-flex">
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
                    <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                        Hi, {{ Auth::user()->nama }}
                        <img src="{{ asset('images/user_pc.png') }}" alt="profile"
                            class="rounded-circle ml-2 profile-picture">
                    </a>
                    <div class="dropdown-menu">
                        @if (auth()->check() && auth()->user()->role == 'admin')
                        <a href="{{ route('admin-dashboard') }}" class="dropdown-item">Dashboard</a>
                        <a href="{{ route('account.index') }}" class="dropdown-item">Settings</a>
                        @else
                        <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                        <a href="{{ route('dashboard-account') }}" class="dropdown-item">Settings</a>
                        @endif
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="dropdown-item">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>

            <!-- mobile menu -->
            <ul class="navbar-nav d-block d-lg-none">
                <li class="nav-item"><a href="#" class="nav-link">Hi. {{ Auth::user()->nama }}</a></li>
                <li class="nav-item"><a href="{{ route('cart') }}" class="nav-link">Cart</a></li>
            </ul>
            @endauth
        </div>
    </div>
</nav>
<style>
    .navbar-teal {
  background-color:rgb(249, 249, 249); /* Warna Charlotte */
  color: white;
  opacity: 100%;
}

.navbar-teal .nav-link {
  color: white;
}

.navbar-teal .nav-link:hover {
  color:rgb(255, 255, 255); /* Warna putih terang saat hover */
}

.navbar-teal .btn-primary {
  background-color:rgb(90, 165, 165); /* Tombol Sign In lebih gelap untuk kontras */
  border: 1px solid black;
  border-radius: 80px;
}

.navbar-teal .btn-primary:hover {
  background-color: #4a9db1; /* Hover tombol */
}
</style>
