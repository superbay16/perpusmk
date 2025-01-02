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
        <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link">Beranda</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('category') }}" class="nav-link">Buku</a>
        </li>
        <li class="nav-item">
          <a href="/tentang" class="nav-link">Tentang</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<style>
  .navbar-teal {
  background-color: teal;
  color: white;
  opacity: 100%;
}
.navbar-teal .nav-link {
  color: white;
}
.navbar-teal .nav-link:hover {
  color: #d1f1f1; /* Warna putih terang saat hover */
}
</style>