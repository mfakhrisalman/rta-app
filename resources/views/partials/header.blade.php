<nav class="navbar navbar-expand-xxl navbar-dark" style="background-color:#013A67">
  <div class="container">
    <a class="navbar-brand" href="#" ><img src="{{ asset('img/Logo.png') }}" alt="Logo RTA" width="89" ></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link {{ ($active === "beranda" ? 'active' : '') }}"  href="/">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === "programtahfidz" ? 'active' : '') }}" href="/program-tahfidz">Program Tahfizh</a>
        </li>        
        <li class="nav-item">
          <a class="nav-link {{ ($active === "rtamart" ? 'active' : '') }}"  href="/rta-mart">RTA Mart</a>
        </li>        
        <li class="nav-item">
          <a class="nav-link {{ ($active === "galeri" ? 'active' : '') }}"  href="/galeri">Galeri</a>
        </li>        
        <li class="nav-item">
          <a class="nav-link {{ ($active === "layanan" ? 'active' : '') }}" href="/layanan">Layanan</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <button type="button" class="btn btn-warning "><a href="/kontak" class="text-decoration-none text-black"><i class="bi bi-telephone-fill"></i>  Kontak</a></button>
        </li>
      </ul>
    </div>
  </div>
</nav>