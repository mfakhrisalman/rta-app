@extends('layouts.main')

@section('container')
<div class="col-md-12 text-center mx-auto">
  <h1 style="font-weight: bolder;">RTA memastikan kamu mendapat suasana belajar yang nyaman dengan berbagai fasilitas yang kami tawarkan</h1>
  <p class="mt-5 col-md-9 text-center mx-auto">
    Kami menawarkan berbagai fasilitas yang mendukung kenyamanan suasana belajar-mengajar dan pelaksanaan kegiatan non-akademik agar tetap kondusif.
  </p>
</div>

<div class="row row-cols-1 row-cols-md-2 mt-5">
  
  <div class="col mb-3 p-5">
    <h1 style="font-weight: bolder;">Gedung luar RTA</h1>
    <p class="mt-3 text-justify">Rumah Tahfizh Akhwat Raudhatul Jannah resmi berdiri dibawah naungan Kemenang RI pada tahun 2021. Pada tahun tersebut juga, gedung RTA didirikan dan hingga sekarang, gedung RTA masih dalam tahap pembangunan. Saat ini, gedung RTA memiliki 13 ruang kelas yang dapat dipakai untuk belajar. </p>
  </div>

  <div class="col mb-3">
    <div id="sliderGedung" class="carousel slide carousel-fade">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#sliderGedung" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#sliderGedung" data-bs-slide-to="1" aria-label="Slide 2"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/gedung2.png" class="d-block w-100" alt="Gedung 2" style="width: 411px; height: 385px;">
          <div class="carousel-caption d-none d-md-block"></div>
        </div>
        <div class="carousel-item">
          <img src="img/gedung.png" class="d-block w-100" alt="Gedung" style="width: 411px; height: 385px;">
          <div class="carousel-caption d-none d-md-block"></div>
        </div>
      </div>
      
      <button class="carousel-control-prev" type="button" data-bs-target="#sliderGedung" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#sliderGedung" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  
  <div class="col mb-3">
    <div id="sliderKelas" class="carousel slide carousel-fade">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#sliderKelas" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#sliderKelas" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#sliderKelas" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/ruangan1.png" class="d-block w-100" alt="Ruangan 1" style="width: 411px; height: 385px;">
          <div class="carousel-caption d-none d-md-block"></div>
        </div>
        <div class="carousel-item">
          <img src="img/ruangan2.png" class="d-block w-100" alt="Ruangan 2" style="width: 411px; height: 385px;">
          <div class="carousel-caption d-none d-md-block"></div>
        </div>
        <div class="carousel-item">
          <img src="img/ruangan3.png" class="d-block w-100" alt="Ruangan 3" style="width: 411px; height: 385px;">
          <div class="carousel-caption d-none d-md-block"></div>
        </div>
      </div>
      
      <button class="carousel-control-prev" type="button" data-bs-target="#sliderKelas" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#sliderKelas" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <div class="col mb-3 p-5">
    <h1 style="font-weight: bolder;">Ruang kelas RTA</h1>
    <div class="p-3">
    <p>RTA memiliki total 4 program kelas sebanyak:</p>
    <p>1. 11 kelas anak-anak  (senin - jumat pukul 15.00-17.00 WIB).</p>
    <p>2. 3 kelas remaja ( senin - kamis pukul 13.30-15.00 WIB).</p>
    <p>3. 2 kelas Ibu-ibu pekerja ( sabtu pukul 08.00-selesai).</p>
    <p>4. 11 kelas reguler (senin - jum'at dengan dua sesi) </p>
    <ul>
        <li>
            Sesi pertama pukul 08.00-11.00
        </li>
        <li>
            Sesi kedua pukul 13.30-17.00
        </li>
    </ul>
    </div>
  </div>
</div>
@endsection
